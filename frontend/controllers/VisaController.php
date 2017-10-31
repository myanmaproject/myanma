<?php

namespace frontend\controllers;

use Yii;
use app\models\Visa;
use frontend\models\VisaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use app\models\Basicdocuments;
use app\models\Documentapplicant;
use app\models\Documentfirsttime;
use app\models\Documenttouristvisa;
use app\models\Transitvisathailand;
use app\models\Familytree;
/**
 * VisaController implements the CRUD actions for Visa model.
 */
class VisaController extends Controller
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
              [
                'allow'=>true,
                'actions'=>['update'],
                'roles'=>['Employee'],
                'matchCallback'=>function($rule,$action){
                  $model = $this->findModel(Yii::$app->request->get('id'));
                  if (\Yii::$app->user->can('UpdateVisa',['model'=>$model])) {
                           return true;
                  }
                }
              ],
              [
                'allow'=>true,
                'actions'=>['delete'],
                'roles'=>['Admin']
              ]
            ]
          ]
      ];
  }

    /**
     * Lists all Visa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visa model.
     * @param integer $id
     * @return mixed
     */



    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }



    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionViewfind($id)
    {
      $findvisa = Visa::find()->where(['familytree_idfamilytree'=>$id])->one();
      if($findvisa == "" || $findvisa == null){
         return $this->redirect(['visa/create']);
      }else{
        
         return $this->render('view', [
            'model' => $this->findModel($findvisa->idvisa)
        ]);
      }
       
    }


    /**
     * Creates a new Visa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Visa();
        $modelbasicducuments = new Basicdocuments();
        $modeldocumentapplicant = new Documentapplicant();
        $modeldocumentfirsttime = new Documentfirsttime();
        $modeldocumenttouristvisa = new Documenttouristvisa();
        $modeltransitvisathailand = new Transitvisathailand();

        // var_dump($modelbasicducuments->load(Yii::$app->request->post()));
        // exit();
        if ($model->load(Yii::$app->request->post()) 
       && $model->save()) {



            $basicList= $_POST['Visa']['basic'];

                      if (is_array($basicList))
                      {
                          foreach ($basicList as $detail) {
                                $Basicdocuments = new Basicdocuments();
                                $Basicdocuments->visa_idvisa = $model->idvisa;
                                $Basicdocuments->detail = $detail;
                                if (!$Basicdocuments->save())print_r($Basicdocuments->errors);
                            }
                      }

            $applicantList= $_POST['Visa']['applicant'];

                      if (is_array($applicantList))
                      {
                          foreach ($applicantList as $detail) {
                                $Documentapplicant = new Documentapplicant();
                                $Documentapplicant->visa_idvisa = $model->idvisa;
                                $Documentapplicant->detail = $detail;
                                if (!$Documentapplicant->save())print_r($Documentapplicant->errors);
                            }
                      }
            $firsttimeList= $_POST['Visa']['firsttime'];

                      if (is_array($firsttimeList))
                      {
                          foreach ($firsttimeList as $detail) {
                                $Documentfirsttime = new Documentfirsttime();
                                $Documentfirsttime->visa_idvisa = $model->idvisa;
                                $Documentfirsttime->detail = $detail;
                                if (!$Documentfirsttime->save())print_r($Documentfirsttime->errors);
                            }
                      }


            $touristvisaList= $_POST['Visa']['touristvisa'];

                      if (is_array($touristvisaList))
                      {
                          foreach ($touristvisaList as $detail) {
                                $Documenttouristvisa = new Documenttouristvisa();
                                $Documenttouristvisa->visa_idvisa = $model->idvisa;
                                $Documenttouristvisa->detail = $detail;
                                if (!$Documenttouristvisa->save())print_r($Documenttouristvisa->errors);
                            }
                      }

            $transitvisaList= $_POST['Visa']['transitvisa'];

                      if (is_array($transitvisaList))
                      {
                          foreach ($transitvisaList as $detail) {
                                $Transitvisathailand = new Transitvisathailand();
                                $Transitvisathailand->visa_idvisa = $model->idvisa;
                                $Transitvisathailand->detail = $detail;
                                if (!$Transitvisathailand->save())print_r($Transitvisathailand->errors);
                            }
                      }



           
       

      
          
            return $this->redirect(['view', 'id' => $model->idvisa]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelbasicducuments' => $modelbasicducuments,
              
                


            ]);
        }
    }

    /**
     * Updates an existing Visa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //ลบ
                    $myArrayBasicdocuments = Basicdocuments::find()->where(['visa_idvisa' => $model->idvisa])->all();
                    foreach( $myArrayBasicdocuments as $key => $value){
                      $delete = Basicdocuments::find()->where(['idbasicDocuments' => $value->idbasicDocuments])->one();
                      $delete->delete();
                    }


                    $basicList= $_POST['Visa']['basic'];

                      if (is_array($basicList))
                      {
                          foreach ($basicList as $detail) {
                                $Basicdocuments = new Basicdocuments();
                                $Basicdocuments->visa_idvisa = $model->idvisa;
                                $Basicdocuments->detail = $detail;
                                if (!$Basicdocuments->save())print_r($Basicdocuments->errors);
                            }
                      }


                      //ลบ
                    $myArrayDocumentapplicant = Documentapplicant::find()->where(['visa_idvisa' => $model->idvisa])->all();
                    foreach( $myArrayDocumentapplicant as $key => $value){
                      $delete = Documentapplicant::find()->where(['iddocumentApplicant' => $value->iddocumentApplicant])->one();
                      $delete->delete();
                    }

            $applicantList= $_POST['Visa']['applicant'];

                      if (is_array($applicantList))
                      {
                          foreach ($applicantList as $detail) {
                                $Documentapplicant = new Documentapplicant();
                                $Documentapplicant->visa_idvisa = $model->idvisa;
                                $Documentapplicant->detail = $detail;
                                if (!$Documentapplicant->save())print_r($Documentapplicant->errors);
                            }
                      }

                      //ลบ
                    $myArrayDocumentfirsttime = Documentfirsttime::find()->where(['visa_idvisa' => $model->idvisa])->all();
                    foreach( $myArrayDocumentfirsttime as $key => $value){
                      $delete = Documentfirsttime::find()->where(['iddocumentFirstTime' => $value->iddocumentFirstTime])->one();
                      $delete->delete();
                    }
            $firsttimeList= $_POST['Visa']['firsttime'];

                      if (is_array($firsttimeList))
                      {
                          foreach ($firsttimeList as $detail) {
                                $Documentfirsttime = new Documentfirsttime();
                                $Documentfirsttime->visa_idvisa = $model->idvisa;
                                $Documentfirsttime->detail = $detail;
                                if (!$Documentfirsttime->save())print_r($Documentfirsttime->errors);
                            }
                      }

//ลบ
                    $myArrayDocumenttouristvisa = Documenttouristvisa::find()->where(['visa_idvisa' => $model->idvisa])->all();
                    foreach( $myArrayDocumenttouristvisa as $key => $value){
                      $delete = Documenttouristvisa::find()->where(['iddocumentTouristVisa' => $value->iddocumentTouristVisa])->one();
                      $delete->delete();
                    }
            $touristvisaList= $_POST['Visa']['touristvisa'];

                      if (is_array($touristvisaList))
                      {
                          foreach ($touristvisaList as $detail) {
                                $Documenttouristvisa = new Documenttouristvisa();
                                $Documenttouristvisa->visa_idvisa = $model->idvisa;
                                $Documenttouristvisa->detail = $detail;
                                if (!$Documenttouristvisa->save())print_r($Documenttouristvisa->errors);
                            }
                      }

//ลบ
                    $myArrayTransitvisathailand = Transitvisathailand::find()->where(['visa_idvisa' => $model->idvisa])->all();
                    foreach( $myArrayTransitvisathailand as $key => $value){
                      $delete = Transitvisathailand::find()->where(['idtransitVisaThailand' => $value->idtransitVisaThailand])->one();
                      $delete->delete();
                    }
            $transitvisaList= $_POST['Visa']['transitvisa'];

                      if (is_array($transitvisaList))
                      {
                          foreach ($transitvisaList as $detail) {
                                $Transitvisathailand = new Transitvisathailand();
                                $Transitvisathailand->visa_idvisa = $model->idvisa;
                                $Transitvisathailand->detail = $detail;
                                if (!$Transitvisathailand->save())print_r($Transitvisathailand->errors);
                            }
                      }



            return $this->redirect(['view', 'id' => $model->idvisa]);
        } else {
          
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Visa model.
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
     * Finds the Visa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }





    public function actionGen($id)
    {
      $pdf_content = $this->renderPartial('view',[
        'model' => $this->findModel($id),]);
      $mpdf = new \mPDF();
      $mpdf->writeHTML($pdf_content);
      $mpdf->Output();
      exit();
    }










    


    public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('_report',[
        'id' => $id
      ]);
 
   // echo $id;
   // exit();
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px},
       table {
    border-collapse: collapse;
}


p {  font-size:10; }', 
         // set mPDF properties on the fly
        //'options' => ['title' => 'Visa'],
         // call mPDF methods on the fly
        // 'methods' => [ 
        //     'SetHeader'=>['Krajee Report Header'], 
        //     'SetFooter'=>['{PAGENO}'],
        // ]
    ]);
   

    // return the pdf output as per the destination setting
    return $pdf->render(); 
   
}















}
