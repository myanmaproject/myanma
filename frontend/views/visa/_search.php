<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\visaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idvisa') ?>

    <?= $form->field($model, 'prefix') ?>

    <?= $form->field($model, 'numberRequested') ?>

    <?= $form->field($model, 'typeOfVisaRequest') ?>

    <?= $form->field($model, 'firstName') ?>

    <?php // echo $form->field($model, 'middleName') ?>

    <?php // echo $form->field($model, 'familyName') ?>

    <?php // echo $form->field($model, 'nationalityBirth') ?>

    <?php // echo $form->field($model, 'maritalStatus') ?>

    <?php // echo $form->field($model, 'TypeTravelDocument') ?>

    <?php // echo $form->field($model, 'noPerson') ?>

    <?php // echo $form->field($model, 'issuedAt') ?>

    <?php // echo $form->field($model, 'dateIssue') ?>

    <?php // echo $form->field($model, 'expiryDate') ?>

    <?php // echo $form->field($model, 'currentAddress') ?>

    <?php // echo $form->field($model, 'telPerson') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'permanentAddress') ?>

    <?php // echo $form->field($model, 'telPermanent') ?>

    <?php // echo $form->field($model, 'minorChildren') ?>

    <?php // echo $form->field($model, 'dateOfArrival') ?>

    <?php // echo $form->field($model, 'traveling') ?>

    <?php // echo $form->field($model, 'flightNo') ?>

    <?php // echo $form->field($model, 'durationOfProposedStay') ?>

    <?php // echo $form->field($model, 'dateOfPrevious') ?>

    <?php // echo $form->field($model, 'countriesForTravel') ?>

    <?php // echo $form->field($model, 'proposedAddressThai') ?>

    <?php // echo $form->field($model, 'nameAddressLocal') ?>

    <?php // echo $form->field($model, 'telThai') ?>

    <?php // echo $form->field($model, 'applicationNoOfficial') ?>

    <?php // echo $form->field($model, 'visaNoOfficial') ?>

    <?php // echo $form->field($model, 'typeOfVisaOfficial') ?>

    <?php // echo $form->field($model, 'categoryOfEntries') ?>

    <?php // echo $form->field($model, 'numberOfEntriesOfficial') ?>

    <?php // echo $form->field($model, 'dateOfIssueOfficial') ?>

    <?php // echo $form->field($model, 'feeOfficial') ?>

    <?php // echo $form->field($model, 'expOfficial') ?>

    <?php // echo $form->field($model, 'documentsOfficial') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'purposeOfVisit') ?>

    <?php // echo $form->field($model, 'familytree_idfamilytree') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
