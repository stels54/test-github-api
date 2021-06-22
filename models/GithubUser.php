<?php

namespace app\models;

use app\models\tables\TblGithubUsers;


class GithubUser extends TblGithubUsers
{
    public $username;

    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'string'],
        ];
    }
}