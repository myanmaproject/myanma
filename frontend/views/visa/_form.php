<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Typeofvisa;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use app\models\Basicdocuments;
use app\models\Visa;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visa-form">


    <?php $form = ActiveForm::begin(); ?>
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($modelbasicducuments, 'detail')->checkBoxList(['php'=>'PHP','jquery'=>'JQuery']) ?>


 <?= $form->field($model, 'familytree_idfamilytree')->textInput() ?>
    <?= $form->field($model, 'prefix')->dropDownList(['0' => 'Mr.', '1' => 'Mrs.','2' => 'Miss.'],['prompt'=>'Please select prefix']) ?>

    <?= $form->field($model, 'numberRequested')->textInput() ?>

        <?= $form->field($model, 'typeOfVisaRequest')->dropDownList(
        ArrayHelper::map(Typeofvisa::find()->all(), 'idtypeOfVisa','name'),
        [
            'prompt'=>'Please select type of visa',

        ]
    )->label('Type of Visa'); ?>


    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'familyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nationalityBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maritalStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TypeTravelDocument')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noPerson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issuedAt')->textInput(['maxlength' => true]) ?>

           <?= $form->field($model, 'dateIssue')->widget(MaskedInput::className(), [ 'mask' => '9999/99/99', ]) ?>
           <?= $form->field($model, 'expiryDate')->widget(MaskedInput::className(), [ 'mask' => '9999/99/99', ]) ?>


    <?= $form->field($model, 'currentAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telPerson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permanentAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telPermanent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minorChildren')->textInput(['maxlength' => true]) ?>

           <?= $form->field($model, 'dateOfArrival')->widget(MaskedInput::className(), [ 'mask' => '9999/99/99', ]) ?>

    <?= $form->field($model, 'traveling')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flightNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'durationOfProposedStay')->textInput(['maxlength' => true]) ?>

           <?= $form->field($model, 'dateOfPrevious')->widget(MaskedInput::className(), [ 'mask' => '9999/99/99', ]) ?>

    <?= $form->field($model, 'countriesForTravel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposedAddressThai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nameAddressLocal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telThai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicationNoOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visaNoOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typeOfVisaOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryOfEntries')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numberOfEntriesOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateOfIssueOfficial')->textInput() ?>

    <?= $form->field($model, 'feeOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documentsOfficial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>



        <?= $form->field($model, 'purposeOfVisit')->dropDownList(['0' => 'Business', '1' => 'Tourism','2' => 'Transit','3' => 'Diplomatic Official'],['prompt'=>'Please select purpose of visit']) ?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
