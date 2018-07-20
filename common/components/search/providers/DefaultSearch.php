<?php

namespace common\components\search\providers;


use common\components\search\BaseSearch;
use common\components\search\SearchInterface;
use common\models\News;

class DefaultSearch extends BaseSearch implements SearchInterface
{
    /**
     * Default Search method
     * @return array|mixed|\yii\db\ActiveRecord[]
     */
    public function search()
    {
        return News::findBySql('SELECT * FROM news WHERE MATCH (text) AGAINST ("'.$this->getQuery().'")')->asArray()->all();
    }
}