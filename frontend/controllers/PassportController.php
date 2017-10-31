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
use app\models\Visa;
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





    public function actionViewfind($id)
    {
      $findpassport = Passport::find()->where(['familytree_idfamilytree'=>$id])->one();
      if($findpassport == "" || $findpassport == null){
         return $this->redirect(['passport/create']);
      }else{
        
         return $this->render('view', [
            'model' => $this->findModel($findpassport->idpassport)
        ]);
      }
       
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


            $studied1= $_POST['Passport']['studied1'];

            // if(!in_array("",$studied1)){
                $Studied = new Studied();

$Studied->passport_idpassport = $model->idpassport;
                $Studied->yearFrom = $studied1['0'];
                                            $Studied->yearTo = $studied1['1'];
                                            $Studied->standardFrom = $studied1['2'];
                                            $Studied->standardTo = $studied1['3'];
                                            $Studied->nameSchool = $studied1['4'];
                                            $Studied->townshipWardVillage = $studied1['5'];
if (!$Studied->save())print_r($Studied->errors);
            // }
            

            $studied2= $_POST['Passport']['studied2'];                    
            // if(!in_array("",$studied2)){
                $Studied = new Studied();
$Studied->passport_idpassport = $model->idpassport;
               
                                            $Studied->yearFrom = $studied2['0'];
                                            $Studied->yearTo = $studied2['1'];
                                            $Studied->standardFrom = $studied2['2'];
                                            $Studied->standardTo = $studied2['3'];
                                            $Studied->nameSchool = $studied2['4'];
                                            $Studied->townshipWardVillage = $studied2['5'];
                                                   if (!$Studied->save())print_r($Studied->errors);             

               // }

               $studied3= $_POST['Passport']['studied3'];                    
            // if(!in_array("",$studied3)){
                $Studied = new Studied();
$Studied->passport_idpassport = $model->idpassport;
               
                                            $Studied->yearFrom = $studied3['0'];
                                            $Studied->yearTo = $studied3['1'];
                                            $Studied->standardFrom = $studied3['2'];
                                            $Studied->standardTo = $studied3['3'];
                                            $Studied->nameSchool = $studied3['4'];
                                            $Studied->townshipWardVillage = $studied3['5'];
                                                                
if (!$Studied->save())print_r($Studied->errors);
               // }                       
           
           $criminalcivillaw1= $_POST['Passport']['criminalcivillaw1'];                    
            // if(!in_array("",$criminalcivillaw1)){
                $Criminalcivillaw = new Criminalcivillaw();
                $Criminalcivillaw->passport_idpassport = $model->idpassport;               
                $Criminalcivillaw->act = $criminalcivillaw1['0'];
                $Criminalcivillaw->punishment = $criminalcivillaw1['1'];
                $Criminalcivillaw->court = $criminalcivillaw1['2'];
                $Criminalcivillaw->periodFrom = $criminalcivillaw1['3'];
                $Criminalcivillaw->periodTo = $criminalcivillaw1['4'];
                $Criminalcivillaw->prison = $criminalcivillaw1['5'];
                                                                
                if (!$Criminalcivillaw->save())print_r($Criminalcivillaw->errors);
            // }    

            $criminalcivillaw2= $_POST['Passport']['criminalcivillaw2'];                    
            // if(!in_array("",$criminalcivillaw2)){
                $Criminalcivillaw = new Criminalcivillaw();
                $Criminalcivillaw->passport_idpassport = $model->idpassport;               
                $Criminalcivillaw->act = $criminalcivillaw2['0'];
                $Criminalcivillaw->punishment = $criminalcivillaw2['1'];
                $Criminalcivillaw->court = $criminalcivillaw2['2'];
                $Criminalcivillaw->periodFrom = $criminalcivillaw2['3'];
                $Criminalcivillaw->periodTo = $criminalcivillaw2['4'];
                $Criminalcivillaw->prison = $criminalcivillaw2['5'];
                                                                
                if (!$Criminalcivillaw->save())print_r($Criminalcivillaw->errors);
            // }      

            $whetheraboard1= $_POST['Passport']['whetheraboard1'];                    
            // if(!in_array("",$whetheraboard1)){
                $Whetheraboard = new Whetheraboard();
                $Whetheraboard->passport_idpassport = $model->idpassport;               
                $Whetheraboard->yearFrom = $whetheraboard1['0'];
                $Whetheraboard->yearTo = $whetheraboard1['1'];
                $Whetheraboard->subjectTravelled = $whetheraboard1['2'];
                $Whetheraboard->country = $whetheraboard1['3'];
                $Whetheraboard->remark = $whetheraboard1['4'];
                                                                
                if (!$Whetheraboard->save())print_r($Whetheraboard->errors);
            // }        

            $whetheraboard2= $_POST['Passport']['whetheraboard2'];                    
            // if(!in_array("",$whetheraboard2)){
                $Whetheraboard = new Whetheraboard();
                $Whetheraboard->passport_idpassport = $model->idpassport;               
                $Whetheraboard->yearFrom = $whetheraboard2['0'];
                $Whetheraboard->yearTo = $whetheraboard2['1'];
                $Whetheraboard->subjectTravelled = $whetheraboard2['2'];
                $Whetheraboard->country = $whetheraboard2['3'];
                $Whetheraboard->remark = $whetheraboard2['4'];
                                                                
                if (!$Whetheraboard->save())print_r($Whetheraboard->errors);
            // }  
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

            $Studied = Studied::find()->where(['passport_idpassport' => $model->idpassport])->all();
            $i = 0;
            foreach ($Studied as $key => $value) {
                $Studied = Studied::find()->where(['idstudied' => $value['idstudied']])->one();
                if($i == 0){
                    $studied = $_POST['Passport']['studied1'];
                    $i++;
                }else if ($i ==1) {
                    $studied = $_POST['Passport']['studied2'];
                    $i++;
                }elseif ($i ==2) {
                    $studied = $_POST['Passport']['studied2'];
                    $i++;
                }

                $Studied->yearFrom = $studied['0'];
                $Studied->yearTo = $studied['1'];
                $Studied->standardFrom = $studied['2'];
                $Studied->standardTo = $studied['3'];
                $Studied->nameSchool = $studied['4'];
                $Studied->townshipWardVillage = $studied['5'];
           
                $Studied->update();
            }

            $Criminalcivillaw = Criminalcivillaw::find()->where(['passport_idpassport' => $model->idpassport])->all();
            $i = 0;
            foreach ($Criminalcivillaw as $key => $value) {
                $Criminalcivillaw = Criminalcivillaw::find()->where(['idcriminalCivillaw' => $value['idcriminalCivillaw']])->one();
            //               var_dump($Criminalcivillaw);
            // exit();
                if($i == 0){
                    $criminalcivillaw = $_POST['Passport']['criminalcivillaw1'];
                    $i++;
                }else if ($i ==1) {
                    $criminalcivillaw = $_POST['Passport']['criminalcivillaw2'];
                    $i++;
                }

                $Criminalcivillaw->act = $criminalcivillaw['0'];
                $Criminalcivillaw->punishment = $criminalcivillaw['1'];
                $Criminalcivillaw->court = $criminalcivillaw['2'];
                $Criminalcivillaw->periodFrom = $criminalcivillaw['3'];
                $Criminalcivillaw->periodTo = $criminalcivillaw['4'];
                $Criminalcivillaw->prison = $criminalcivillaw['5'];
           
                $Criminalcivillaw->update();
            }

            $Whetheraboard = Whetheraboard::find()->where(['passport_idpassport' => $model->idpassport])->all();
            $i = 0;
            foreach ($Whetheraboard as $key => $value) {
                $Whetheraboard = Whetheraboard::find()->where(['idwhetheraboard' => $value['idwhetheraboard']])->one();
           
                if($i == 0){
                    $whetheraboard = $_POST['Passport']['whetheraboard1'];
                    $i++;
                }else if ($i ==1) {
                    $whetheraboard = $_POST['Passport']['whetheraboard2'];
                    $i++;
                }

                $Whetheraboard->yearFrom = $whetheraboard['0'];
                $Whetheraboard->yearTo = $whetheraboard['1'];
                $Whetheraboard->subjectTravelled = $whetheraboard['2'];
                $Whetheraboard->country = $whetheraboard['3'];
                $Whetheraboard->remark = $whetheraboard['4'];
           
                $Whetheraboard->update();
            }
            
            


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
