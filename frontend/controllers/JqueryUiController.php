<?php
namespace frontend\controllers;

use frontend\models\AutoComplete;
use Yii;

class JqueryUiController extends \yii\web\Controller
{
	public function actionAutoComplete()
	{
		$model = new AutoComplete();
		
		if($model->load(Yii::$app->request->post())){
			
		}
		return $this->render('auto-complete', [
			'model' => $model
		]);
	}
}