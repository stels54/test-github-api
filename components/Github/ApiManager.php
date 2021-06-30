<?php

namespace app\components\Github;

use app\components\Github\Dto\UserDto;
use app\components\Github\Dto\RepositoryDto;
use Github\Client;

class ApiManager
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->authenticate(\Yii::$app->params['github']['token'], null, Client::AUTH_ACCESS_TOKEN);
    }

    public function getUser(string $username) : UserDto
    {
        return new UserDto($this->client->api('user')->show($username));
    }

    /**
     * @param string $username
     * @return RepositoryDto[]
     */
    public function getUserRepositories(string $username) : array
    {
        $result = [];

        $repositories = $this->client->api('user')->repositories($username, 'owner', 'updated', 'desc');
        foreach ($repositories as $repository) {
            $result[] = new RepositoryDto($repository);
        }

        return $result;
    }
}