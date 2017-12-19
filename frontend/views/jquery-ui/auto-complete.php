<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

$this->title = 'AutoComplete Testing';
?>
<h1><?=$this->title?></h1>

<?php $form = ActiveForm::begin()?>
<?=$form->field($model, 'id');//โดยปกติตรงนี้จะเป็น ->hiddenInput() แต่เพื่อให้เห็นการทำงานจะทำเป็น TextInput ปกติ?>
<?=$form->field($model, 'name')->widget(AutoComplete::className(), [
	'options' => [
		'class' => 'form-control'
	],
	'clientOptions' => [
		'source' => [
			['id' => 1, 'value' => 'Test1', 'label' => 'Test1'],
			['id' => 2, 'value' => 'Test2', 'label' => 'Test2'],
			['id' => 3, 'value' => 'Test3', 'label' => 'Test3'],
			['id' => 4, 'value' => 'Test4', 'label' => 'Test4'],
			['id' => 5, 'value' => 'Test5', 'label' => 'Test5'],
		],//สามารถใช้ Model::find()->select(['id as id', 'name as value', 'name as label'])->asArray()->all();
		
		'select' => new JsExpression("function( event, ui ) {
    									$(this).val(ui.item.id);
    									$(this).init_id();
 									}")
	]
])?>

<?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end()?>
<hr />
<?php 
if(Yii::$app->request->post()){
	echo $model->id.'<br>';
	echo $model->name;
}
?>
<?php $this->registerJsFile('http://code.jquery.com/jquery-migrate-3.0.0.js', ['depends' => [\yii\web\JqueryAsset::className()]])?>
<?php $this->registerJs('
                $.fn.init_id = function(){
                    $("#autocomplete-id").val($(this).val());            
                };
           
            ')?>