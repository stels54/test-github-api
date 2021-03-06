<?php

namespace app\controllers;

use app\components\Github\ApiManager;
use app\components\GithubUserUpdater;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\GithubUser;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use Yii;
use yii\web\ServerErrorHttpException;

class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => GithubUser::find()
            ])
        ]);
    }

    /**
     * Creates a new GithubUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $apiManager = new ApiManager();
        $model = new GithubUser(['apiManager' => $apiManager]);

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                try {
                    $userUpdater = new GithubUserUpdater($apiManager);
                    if ($userUpdater->updateUser($model)) {
                        return $this->redirect('index');
                    }
                }catch (\Exception $e) {
                    throw new ServerErrorHttpException('Can not save user');
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GithubUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GithubUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GithubUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GithubUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}