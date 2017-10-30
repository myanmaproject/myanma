<?php

namespace frontend\controllers;

use Yii;
use app\models\Passport;
use app\models\PassportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Studied;
use app\models\Criminalcivillaw;
use app\models\Whetheraboard;

/**
 * PassportController implements the CRUD actions for Passport model.
 */
class PassportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Passport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PassportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Passport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Passport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Passport();
        $Studied = new Studied();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

 // var_dump(!in_array("",$_POST['studied2']) );
 //            exit();


            $studied1= $_POST['studied1'];

            if(!in_array("",$studied1)){
                $Studied = new Studied();

$Studied->passport_idpassport = $model->idpassport;
                $Studied->yearFrom = $studied1['0'];
                                            $Studied->yearTo = $studied1['1'];
                                            $Studied->standardFrom = $studied1['2'];
                                            $Studied->standardTo = $studied1['3'];
                                            $Studied->nameSchool = $studied1['4'];
                                            $Studied->townshipWardVillage = $studied1['5'];
if (!$Studied->save())print_r($Studied->errors);
            }
            

            $studied2= $_POST['studied2'];                    
            if(!in_array("",$studied2)){
                $Studied = new Studied();
$Studied->passport_idpassport = $model->idpassport;
               
                                            $Studied->yearFrom = $studied2['0'];
                                            $Studied->yearTo = $studied2['1'];
                                            $Studied->standardFrom = $studied2['2'];
                                            $Studied->standardTo = $studied2['3'];
                                            $Studied->nameSchool = $studied2['4'];
                                            $Studied->townshipWardVillage = $studied2['5'];
                                                   if (!$Studied->save())print_r($Studied->errors);             

               }

               $studied3= $_POST['studied3'];                    
            if(!in_array("",$studied3)){
                $Studied = new Studied();
$Studied->passport_idpassport = $model->idpassport;
               
                                            $Studied->yearFrom = $studied3['0'];
                                            $Studied->yearTo = $studied3['1'];
                                            $Studied->standardFrom = $studied3['2'];
                                            $Studied->standardTo = $studied3['3'];
                                            $Studied->nameSchool = $studied3['4'];
                                            $Studied->townshipWardVillage = $studied3['5'];
                                                                
if (!$Studied->save())print_r($Studied->errors);
               }                       
           

            return $this->redirect(['view', 'id' => $model->idpassport]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Passport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpassport]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Passport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Passport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Passport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Passport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
