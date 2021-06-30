<?php

namespace app\components;

use app\components\Github\ApiManager;
use app\components\Github\Dto\UserDto;
use app\models\GithubUser;

class GithubUserUpdater
{
    /**
     * @var ApiManager
     */
    private $apiManager;

    public function __construct(ApiManager $apiManager)
    {
        $this->apiManager = $apiManager;
    }

    private function getGithubUserDto(string $login) : UserDto
    {
        return $this->apiManager->getUser($login);
    }

    public function updateUser(GithubUser $githubUser) : bool
    {
        $githubUserDto = $this->getGithubUserDto($githubUser->login);

        if ($githubUserDto === null) {
            return false;
        }

        $githubUser->setAttributes($githubUserDto->all());

        return $githubUser->save();
    }
}