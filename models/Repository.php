<?php

namespace app\models;

use app\components\behaviors\DatetimeFormatBehavior;
use app\models\tables\TblRepositories;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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

    public function rules()
    {
        return ArrayHelper::merge([
            ['id', 'integer'],
        ], parent::rules());
    }
}