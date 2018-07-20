<?php

namespace common\components\search;

class SearchFactory
{
    public static function factory($className, $query)
    {
        $class = '\common\components\search\providers\\'.$className;
        $provider = new $class();
        $provider->setQuery($query);
        return $provider->search();
    }
}