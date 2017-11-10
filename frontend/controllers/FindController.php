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
   
   
public function behaviors()
     {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['post'],
              ],
          ],
          'access'=>[
            'class'=>AccessControl::className(),
            'rules'=>[
              [
                'allow'=>true,
                'actions'=>['index','view','create'],
                'roles'=>['Employee']
              ],
            [
                'allow'=>true,
                'actions'=>['index','view','create','update','report','viewfind'],
                'roles'=>['Management']
              ],
            [
                'allow'=>true,
                'actions'=>['index','view','create','update'],
                'roles'=>['Manageuser']
              ],
              // [
              //   'allow'=>true,
              //   'actions'=>['update'],
              //   'roles'=>['Employee'],
              //   'matchCallback'=>function($rule,$action){
              //     $model = $this->findModel(Yii::$app->request->get('id'));
              //     if (\Yii::$app->user->can('UpdateVisa',['model'=>$model])) {
              //              return true;
              //     }
              //   }
              // ],
              [
                'allow'=>true,
                'actions'=>['delete'],
                'roles'=>['Admin']
              ]
            ]
          ]
      ];
  }



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