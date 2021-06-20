<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GithubUser */

$this->title = 'Добавить пользователя';

?>
<div class="github-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>