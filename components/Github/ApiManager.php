<?php

namespace app\components\Github;

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

    public function userExists(string $username) : bool
    {
        try {
            $this->client->api('user')->show($username);
            return true;
        }catch (\Exception $e) {
            $this->handleErr($e);
        }

        return false;
    }

    public function getUserRepositories(string $username) : array
    {
        $repositories = [];

        try {
            $repositories = $this->client->api('user')->repositories($username, 'owner', 'updated', 'desc');
        }catch (\Exception $e) {
            $this->handleErr($e);
        }

        return $repositories;
    }

    private function handleErr(\Exception $e) : void
    {
        if ($e->getMessage() !== "Not Found") {
            \Yii::error($e);
        }
    }
}