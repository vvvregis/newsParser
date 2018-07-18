<?php

namespace common\components\parser;


use common\models\News;

class ParserFactory
{
    /**
     * @param $className
     * @throws \yii\web\HttpException
     */
    public function factory($className)
    {
        $class = new $className();
        News::AddFromParser($class);
    }
}