<?php

namespace common\components\search;

class SearchFactory
{
    /**
     * Start Search Factory
     * @param $className string
     * @param $query string
     * @return mixed
     */
    public static function factory($className, $query)
    {
        $class = '\common\components\search\providers\\'.$className;
        $provider = new $class();
        $provider->setQuery($query);
        return $provider->search();
    }
}