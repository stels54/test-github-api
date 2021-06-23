<?php

namespace app\commands;

use yii\console\Controller;
use yii2tech\crontab\CronTab;

class CronController extends Controller
{
    public function actionIndex()
    {
        $crontab = new CronTab();
        $crontab->removeAll();

        $crontab->headLines = [
            'SHELL=/bin/bash',
            'MAILTO=""'
        ];

        $crontab->setJobs([
            ['line' => '*/10 * * * * php '.\Yii::$app->basePath.'/yii repository/update'],
        ])->apply();
    }
}