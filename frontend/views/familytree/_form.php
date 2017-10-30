<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\familytree;
/* @var $this yii\web\View */
/* @var $model app\models\Familytree */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="familytree-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateOfBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placeOfBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raceNationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nrc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aliveOrDeath')->textInput(['maxlength' => true]) ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
