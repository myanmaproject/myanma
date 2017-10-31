<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Familytree;
use app\models\FamilytreeSearch;

/**
 * ProfileController implements the CRUD actions for User model.
 */
class FindController extends Controller
{
   
   




    public function actionIndex()
    {
        $model = new Familytree();
        $searchModel = new FamilytreeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
        'model' => $model,
       'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,]);
    }


    



}