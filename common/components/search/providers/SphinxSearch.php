<?php

namespace common\components\search\providers;


use common\components\search\BaseSearch;
use common\components\search\SearchInterface;
use yii\sphinx\Query;

class SphinxSearch extends BaseSearch implements SearchInterface
{
    /**
     * Sphinx Search method
     * @return array|mixed|\yii\sphinx\ActiveRecord[]
     */
    public function search()
    {
        $query = new Query();
        $results = $query
            ->select('id, title')
            ->from('news')
            ->match($this->getQuery())
            ->all();
        return $results;

    }
}