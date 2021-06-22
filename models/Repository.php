<?php

namespace app\models;

use app\components\behaviors\DatetimeFormatBehavior;
use app\models\tables\TblRepositories;
use yii\db\ActiveRecord;

class Repository extends TblRepositories
{
    public function behaviors()
    {
        return [
            [
                'class' => DatetimeFormatBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                ],
            ],
        ];
    }
}