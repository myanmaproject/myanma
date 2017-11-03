<?php

namespace frontend\controllers;

use Yii;
use app\models\Familytree;
use app\models\FamilytreeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


/**
 * FamilytreeController implements the CRUD actions for Familytree model.
 */
class FamilytreeController extends Controller
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
     * Lists all Familytree models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FamilytreeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Familytree model.
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
     * Creates a new Familytree model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Familytree();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idfamilytree]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Familytree model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idfamilytree]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Familytree model.
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
     * Finds the Familytree model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Familytree the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Familytree::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


     public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts
    
    $Familytree = Familytree::find()->where(['idfamilytree' => $id])->one();


    if ($Familytree->father!=null) {
        $father = Familytree::find()->where(['idfamilytree' => $Familytree->father])->one();
    }

    if ($Familytree->mother!=null) {
        $mother = Familytree::find()->where(['idfamilytree' => $Familytree->mother])->one();
    }
    var_dump($Familytree);
    exit();

    

    $content = $this->renderPartial('_report',[
        'id' => $id,
        
      ]);
 
   // echo $id;
   // exit();
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        'filename'=> 'family',
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_LANDSCAPE, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        'options' => ['title' => 'family'],
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
