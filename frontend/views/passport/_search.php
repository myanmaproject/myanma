<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PassportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpassport') ?>

    <?= $form->field($model, 'familytree_idfamilytree') ?>

    <?= $form->field($model, 'otherName') ?>

    <?= $form->field($model, 'identificationMark') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'presentOccupation') ?>

    <?php // echo $form->field($model, 'presentOccupationAddress') ?>

    <?php // echo $form->field($model, 'educationalQual') ?>

    <?php // echo $form->field($model, 'citizenshipSecCardNo') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'eye') ?>

    <?php // echo $form->field($model, 'hair') ?>

    <?php // echo $form->field($model, 'spouseName') ?>

    <?php // echo $form->field($model, 'spouseOccupation') ?>

    <?php // echo $form->field($model, 'spouseOccupationAddress') ?>

    <?php // echo $form->field($model, 'subjectTravelled') ?>

    <?php // echo $form->field($model, 'countryApplied') ?>

    <?php // echo $form->field($model, 'departmentTransferred') ?>

    <?php // echo $form->field($model, 'departmentTransferredCurrent') ?>

    <?php // echo $form->field($model, 'detailOfSiblingsApplicant') ?>

    <?php // echo $form->field($model, 'detailOfSpouseApplicant') ?>

    <?php // echo $form->field($model, 'detailOfChildrenApplicant') ?>

    <?php // echo $form->field($model, 'detailOfSiblingsFather') ?>

    <?php // echo $form->field($model, 'detailOfSiblingsMother') ?>

    <?php // echo $form->field($model, 'detailOfSiblingsSpouse') ?>

    <?php // echo $form->field($model, 'passportNo') ?>

    <?php // echo $form->field($model, 'passportIssueDate') ?>

    <?php // echo $form->field($model, 'placeDeliveredPassport') ?>

    <?php // echo $form->field($model, 'dateDeliveredPassport') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
