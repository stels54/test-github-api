<?php

namespace app\models;

use app\components\Github\ApiManager;
use app\models\tables\TblGithubUsers;
use yii\helpers\ArrayHelper;
use Yii;

class GithubUser extends TblGithubUsers
{
    /**
     * @var ApiManager
     */
    public $apiManager;

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

    public function beforeSave($insert)
    {
        $this->created_at = Yii::$app->formatter->asDate($this->created_at, 'php:Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }
}