<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\familytree;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Familytree */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header with-border">

    <?php $form = ActiveForm::begin(); ?>


 <div class="col-md-6">


    <?= $form->field($model, 'familytree')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'dateOfBirth')->textInput(['maxlength' => true]) ?>
 --><?= $form->field($model, 'dateOfBirth')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
    ]
]); ?>
    <?= $form->field($model, 'placeOfBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raceNationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nrc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aliveOrDeath')->dropDownList(['Alive' => 'Alive'
            , 'Death' => 'Death']
            ); ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'father')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(familytree::find()->all(),'idfamilytree','name'),
                'language' => 'th',
                'options' => ['placeholder' => 'father name'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>


                <?= $form->field($model, 'mother')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(familytree::find()->all(),'idfamilytree','name'),
                'language' => 'th',
                'options' => ['placeholder' => 'mother name'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
 <div class="clearfix"></div>
            <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
</div>