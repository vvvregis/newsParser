<?php

namespace common\models;


use common\traits\ModelBehaviorTrait;

class NewsCategory extends \common\models\generated\NewsCategory
{
    use ModelBehaviorTrait;

    /**
     * Return all news categories
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllCategories()
    {
        return self::find()->all();
    }
}