<?php

namespace common\components\parser;


use common\models\News;

class ParserFactory
{
    /**
     * @param $className
     */
    public function factory($className)
    {
        $class = new $className();
        News::AddFromParser($class);
    }
}