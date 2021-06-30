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

    }

    public function getUser(string $username) :? UserDto
    {
        try {
            return new UserDto($this->client->api('user')->show($username));
        }catch (\Exception $e) {
            $this->handleErr($e);
        }

        return null;
    }

    /**
     * @param string $username
     * @return RepositoryDto[]
     */
    public function getUserRepositories(string $username) : array
    {
        $result = [];

        try {
            $repositories = $this->client->api('user')->repositories($username, 'owner', 'updated', 'desc');
            foreach ($repositories as $repository) {
                $result[] = new RepositoryDto($repository);
            }
        }catch (\Exception $e) {
            $this->handleErr($e);
        }

        return $result;
    }

    private function handleErr(\Exception $e) : void
    {
        if ($e->getMessage() !== "Not Found") {
            \Yii::error($e);
        }
    }
}