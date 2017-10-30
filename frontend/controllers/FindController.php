<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Familytree;
/**
 * ProfileController implements the CRUD actions for User model.
 */
class FindController extends Controller
{
   



    public function actionIndex()
    {
        $model = new Familytree();
        return $this->render('index',[
        'model' => $model]);
    }



}