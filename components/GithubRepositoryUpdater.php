<?php

namespace app\components;

use app\components\Github\ApiManager;
use app\components\Github\Dto\RepositoryDto;
use app\models\GithubUser;
use app\models\Repository;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;

class GithubRepositoryUpdater
{
    private const REPOSITORIES_TO_SAVE = 10;

    /**
     * @var ApiManager
     */
    private $apiManager;

    public function __construct(ApiManager $apiManager)
    {
        $this->apiManager = $apiManager;
    }

    /**
     * @throws ServerErrorHttpException
     */
    public function updateRepositories() : void
    {
        $db = \Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            Repository::deleteAll();

            foreach ($this->getRepositoriesToSave() as $repository) {

                $model = new Repository();
                $model->setAttributes($repository->all());
                $model->user_id = $repository->owner['id'];
                if (!$model->save()) {
                    \Yii::error([
                        'Message' => 'Can not save Repository',
                        'Errors' => $model->getErrors()
                    ]);
                    throw new ServerErrorHttpException('Can not update repositories');
                }
            }

            $transaction->commit();
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw new ServerErrorHttpException($e->getMessage());
        }
    }

    /**
     * @return RepositoryDto[]
     */
    private function getRepositoriesToSave() : array
    {
        $repositories = [];

        foreach ($this->getLogins() as $login) {
            $repositories = ArrayHelper::merge($repositories, $this->apiManager->getUserRepositories($login));
        }

        usort($repositories, function (RepositoryDto $a, $b) {
            return strtotime($b->updated_at) - strtotime($a->updated_at);
        });

        return array_slice($repositories, 0, self::REPOSITORIES_TO_SAVE);
    }

    /**
     * @return string[]
     */
    private function getLogins() : array
    {
        return GithubUser::find()->select('login')->column();
    }
}