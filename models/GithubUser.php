<?php

namespace app\models;

use app\components\behaviors\DatetimeFormatBehavior;
use app\components\Github\ApiManager;
use app\models\tables\TblGithubUsers;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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
        if ($this->apiManager->getUser($this->$attribute) === null) {
            $this->addError($attribute, 'User not found on Github');
        }
    }

    public function beforeDelete()
    {
        Repository::deleteAll(['user_id' => $this->id]);

        return parent::beforeDelete();
    }
}