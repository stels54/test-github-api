<?php

namespace app\models;

use app\components\behaviors\DatetimeFormatBehavior;
use app\components\Github\ApiManager;
use app\models\tables\TblGithubUsers;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;

class GithubUser extends TblGithubUsers
{
    /**
     * @var ApiManager
     */
    public $apiManager;

    public function behaviors()
    {
        return [
            [
                'class' => DatetimeFormatBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    public function rules()
    {
        return ArrayHelper::merge([
            ['id', 'integer'],
            ['login', 'trim'],
            ['login', 'unique'],
            ['login', 'validateGithubUser']
        ], parent::rules());
    }

    public function validateGithubUser($attribute)
    {
        try {
            $this->apiManager->getUser($this->$attribute);
        }catch (\Exception $e) {
            if ($e->getMessage() === "Not Found") {
                $this->addError($attribute, 'User not found on Github');
            }else {
                throw new ServerErrorHttpException("Some problem with Github Api");
            }
        }
    }

    public function beforeDelete()
    {
        Repository::deleteAll(['user_id' => $this->id]);

        return parent::beforeDelete();
    }
}