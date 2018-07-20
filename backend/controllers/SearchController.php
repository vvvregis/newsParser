<?php

namespace backend\controllers;


use common\components\search\SearchFactory;
use yii\web\Controller;

class SearchController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRunSearch()
    {
        $request = \Yii::$app->request;
        $response = [];
        if ($className = $request->post('className')) {
            $results = SearchFactory::factory($className, $request->post('query'));
            $response['html'] = $this->renderPartial('search-results', ['results' => $results]);
            die(json_encode($response));
        }
    }
}