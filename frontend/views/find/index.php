<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Find People';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-header with-border">

        <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-6">

            <?= $form->field($model, 'idfamilytree')->textInput(array('placeholder' => ''))->label('Name') ?>

            <?= $form->field($model, 'nrc')->textInput(array('placeholder' => ''))->label('NRC') ?>



        <?php ActiveForm::end(); ?>

       

          