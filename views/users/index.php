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
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'login',
            [
                'attribute' => 'avatar_url',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img($model->avatar_url,
                        ['width' => '150px']);
                },
            ],
            'html_url:url',
            'name',
            'location',
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}']
        ],
    ]); ?>

    </div>
</div>