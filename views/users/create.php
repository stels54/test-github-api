<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GithubUser */

$this->title = 'Add User';

?>
<div class="github-user-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>