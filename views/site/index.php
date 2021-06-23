<?php

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

?>
<div class="site-index">

    <div class="row">
        
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'user_id',
                'user.login',
                'html_url:url',
                'description',
                'created_at:datetime',
                'updated_at:datetime'
            ],
        ]); ?>

    </div>
</div>
