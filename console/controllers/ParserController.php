<?php

namespace console\controllers;


use common\components\parser\NewsOneParser;
use common\components\parser\ParserFactory;
use yii\console\Controller;

class ParserController extends Controller
{
    public function actionIndex()
    {
        $ss = new ParserFactory();
        $ss->factory(NewsOneParser::class);
    }
}