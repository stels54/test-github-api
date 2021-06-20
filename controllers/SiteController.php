<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\TblGithubUsers;
use app\models\TblRepositories;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => TblRepositories::find()
            ])
        ]);
    }

    public function actionUsers()
    {
        return $this->render('users', [
            'dataProvider' => new ActiveDataProvider([
                'query' => TblGithubUsers::find()
            ])
        ]);
    }
}
