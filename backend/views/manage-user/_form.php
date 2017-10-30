<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header with-border">

    <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <div class="row">
      <div class="col-lg-6">
          <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
      </div>
      <div class="col-lg-6">
        <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
      </div>
    </div>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'roles')->checkboxList($model->getAllRoles()) ?>

    <?= $form->field($model, 'status')->radioList($model->getItemStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>