<?php

namespace app\components\behaviors;

use yii\behaviors\AttributeBehavior;

class DatetimeFormatBehavior extends AttributeBehavior
{
    public function evaluateAttributes($event)
    {
        if (!empty($this->attributes[$event->name])) {
            $attributes = (array) $this->attributes[$event->name];
            foreach ($attributes as $attribute) {
                $this->owner->$attribute = \Yii::$app->formatter->asDate($this->owner->$attribute, 'php:Y-m-d H:i:s');
            }
        }
    }
}