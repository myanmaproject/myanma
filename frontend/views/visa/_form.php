<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Typeofvisa;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use app\models\Basicdocuments;
use app\models\Visa;
use app\models\Documentapplicant;
use app\models\Documentfirsttime;
use app\models\Documenttouristvisa;
use app\models\Transitvisathailand;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */
// var_dump(Basicdocuments::find()->where(['visa_idvisa' => $model->idvisa])->asArray()->all());
// exit();

?>

<div class="box">
 <div class="box-header with-border">

    <?php $form = ActiveForm::begin(); ?>
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php
        if(!$model->isNewRecord){
          $Basicdocuments = Basicdocuments::find()->where(['visa_idvisa' => $model->idvisa])->all();
            if ($Basicdocuments!=null) {
                foreach ($Basicdocuments as $data) {
                    $checkedFeatureArr[] = $data->detail;
                }
                $model->basic = $checkedFeatureArr;

              
            }

            $Documentapplicant = Documentapplicant::find()->where(['visa_idvisa' => $model->idvisa])->all();
            if ($Documentapplicant!=null) {
                foreach ($Documentapplicant as $data) {
                    $checkedFeatureArr[] = $data->detail;
                }
                $model->applicant = $checkedFeatureArr;
            }

            $Documentfirsttime = Documentfirsttime::find()->where(['visa_idvisa' => $model->idvisa])->all();
            if ($Documentfirsttime!=null) {
                foreach ($Documentfirsttime as $data) {
                    $checkedFeatureArr[] = $data->detail;
                }
                $model->firsttime = $checkedFeatureArr;
            }

            $Documenttouristvisa = Documenttouristvisa::find()->where(['visa_idvisa' => $model->idvisa])->all();
            if ($Documenttouristvisa!=null) {
                foreach ($Documenttouristvisa as $data) {
                    $checkedFeatureArr[] = $data->detail;
                }
                $model->touristvisa = $checkedFeatureArr;
            }

            $Transitvisathailand = Transitvisathailand::find()->where(['visa_idvisa' => $model->idvisa])->all();
            if ($Transitvisathailand!=null) {
                foreach ($Transitvisathailand as $data) {
                    $checkedFeatureArr[] = $data->detail;
                }
                $model->transitvisa = $checkedFeatureArr;
            }
        }

         $listBasic = ['passport of travel document of which validity is no less than 6 months'=>'passport of travel document of which validity is no less than 6 months',
         'visa application form completely filled in'=>'visa application form completely filled in',
         '2 recent colour photos (3.5 x 4.5 cm.)' => '2 recent colour photos (3.5 x 4.5 cm.)',
         'invitation letter (if any)' => 'invitation letter (if any)'];

         $listApplicant = ['appointment letter or certificate that applicant requires medical treatment in Thailand' => 'appointment letter or certificate that applicant requires medical treatment in Thailand'];

         $listFirsttime = ['letter of employment (for employee) or company registration (for business owner)' => 'letter of employment (for employee) or company registration (for business owner)',
         'invitation letter (if any)' => 'invitation letter (if any)',
         'evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)'=>'evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)',
         'confirmed round trip air ticket' => 'confirmed round trip air ticket'];

         $listTouristvisa = ['letter of employment (for employee) of' => 'letter of employment (for employee) of',
         'company registration (for business owner) or' => 'company registration (for business owner) or',
         'guarantee/ invitation letter from company in Thailand (if any) or' => 'guarantee/ invitation letter from company in Thailand (if any) or',
         'receipt or invoice from past procurement (if any)' => 'receipt or invoice from past procurement (if any)'];

         $listTransitvisa = ['passport or travel document of which validity is no less than 6 months' => 'passport or travel document of which validity is no less than 6 months',
         'visa application form completely filled in' => 'visa application form completely filled in',
         '2 recent colour photo (3.5 x 4.5 cm.)' => '2 recent colour photo (3.5 x 4.5 cm.)',
         'visa issued by the country of destination (except traveling to own country)'=>'visa issued by the country of destination (except traveling to own country)'];
    ?>

<?php 

if(isset ($_GET["familytree_idfamilytree"])){
  if($_GET["familytree_idfamilytree"]!=null){

    $model->familytree_idfamilytree = $_GET["familytree_idfamilytree"];
  }
}
?>

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

    <?= $form->field($model, 'basic')->checkBoxList($listBasic) ?>
    <?= $form->field($model, 'applicant')->checkBoxList($listApplicant) ?>
    <?= $form->field($model, 'firsttime')->checkBoxList($listFirsttime) ?>
    <?= $form->field($model, 'touristvisa')->checkBoxList($listTouristvisa) ?>
    <?= $form->field($model, 'transitvisa')->checkBoxList($listTransitvisa) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>