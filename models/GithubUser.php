<?php

namespace app\models;

use yii\base\Model;
use app\models\tables\TblGithubUsers;


class GithubUser extends TblGithubUsers
{
    public $username;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'string'],
        ];
    }
}