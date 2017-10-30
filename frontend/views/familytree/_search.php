<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FamilytreeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="familytree-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfamilytree') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'dateOfBirth') ?>

    <?= $form->field($model, 'placeOfBirth') ?>

    <?= $form->field($model, 'raceNationality') ?>

    <?php // echo $form->field($model, 'nrc') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'aliveOrDeath') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'mother') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
