<?php

namespace common\components\search;


class SearchFactory
{
    public function factory($className)
    {
        $provider = new $className;
        return $provider->search();
    }
}