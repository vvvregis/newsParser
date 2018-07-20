<?php

namespace common\components\search\providers;


use common\components\search\BaseSearch;
use common\components\search\SearchInterface;
use yii\elasticsearch\Query;

class ElasticSearch extends BaseSearch implements SearchInterface
{

    /**
     * Elastic Search method
     * @return array|mixed|null
     */
    public function search()
    {
        $query = new Query;
        $query->fields(['id', 'title', 'text'])
            ->from('news')
            ->query(["match" => ["text" => $this->getQuery()]])
            ->limit(10);
        $command = $query->createCommand();
        $result = $command->search();
        $preparedResult = $this->prepareResultsArray($result);
        return $preparedResult;

    }

    /**
     * Prepared result array for render
     * @param $result
     * @return array|null
     */
    private function prepareResultsArray($result)
    {
        if (!isset($result['hits']['hits']) || count($result['hits']['hits']) == 0) {
            return null;
        }
        $preparedArray = [];
        foreach ($result['hits']['hits'] as $result) {
            $oneResult['id'] = $result['fields']['id'][0];
            $oneResult['title'] = $result['fields']['title'][0];
            array_push($preparedArray, $oneResult);
        }
        return $preparedArray;

    }
}