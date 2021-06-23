<?php

namespace app\components;

use app\components\Github\ApiManager;
use app\components\Github\Dto\RepositoryDto;
use app\models\GithubUser;
use app\models\Repository;
use yii\helpers\ArrayHelper;

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

    public function updateRepositories() : void
    {
        Repository::deleteAll();

        foreach ($this->getRepositoriesToSave() as $repository) {

            $model = new Repository();
            $model->setAttributes($repository->all());
            $model->user_id = $repository->owner['id'];

            if (!$model->save()) {
                \Yii::error([
                    'Message' => 'Cannot save Repository',
                    'Errors' => $model->getErrors()
                ]);
            }
        }
    }

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

    private function getLogins() : array
    {
        return GithubUser::find()->select('login')->column();
    }
}