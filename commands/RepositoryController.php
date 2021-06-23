<?php

namespace app\commands;

use app\components\Github\ApiManager;
use app\components\GithubRepositoryUpdater;
use yii\console\Controller;
use yii\console\ExitCode;

class RepositoryController extends Controller
{
    public function actionUpdate()
    {
        try {
            $updater = new GithubRepositoryUpdater(new ApiManager());
            $updater->updateRepositories();
        }catch (\Exception $e) {
            \Yii::error($e);
        }

        return ExitCode::OK;
    }
}
