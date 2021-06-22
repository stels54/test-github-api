<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

?>
<div class="site-index">

    <div class="row panel">
        <div class="btn-group" role="group" aria-label="...">
            <?= Html::a('Add Github User', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="row">

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'login',
            'html_url',
            'name',
            'location',
            'avatar_url',
            'created_at',
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>

    </div>
</div>