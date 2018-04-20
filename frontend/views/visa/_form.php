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
use kartik\widgets\DatePicker;
use app\models\Regionthai;
use app\models\Provincethai;
use app\models\Districtthai;
use app\models\Subdistrictthai;

use yii\web\View;

use app\models\state;
use app\models\district;
use app\models\township;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */
// var_dump(Basicdocuments::find()->where(['visa_idvisa' => $model->idvisa])->asArray()->all());
// exit();

?>

<div class="box">
 <div class="box-header with-border">

    <?php $form = ActiveForm::begin(); ?>
     <div class="col-md-6">


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

         $listBasic = ['visa of travel document of which validity is no less than 6 months'=>'visa of travel document of which validity is no less than 6 months',
         'visa application form completely filled in'=>'visa application form completely filled in',
         '2 recent colour photos (3.5 x 4.5 cm.)' => '2 recent colour photos (3.5 x 4.5 cm.)',
         'invitation letter (if any)' => 'invitation letter (if any)'];

         $listApplicant = ['appointment letter or certificate that applicant requires medical treatment in Thailand' => 'appointment letter or certificate that applicant requires medical treatment in Thailand'];

         $listFirsttime = ['letter of employment (for employee) or company registration (for business owner)' => 'letter of employment (for employee) or company registration (for business owner)',
         'invitation letter (if any)' => 'invitation letter (if any)',
         'evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)'=>'evidence of sufficient financial means to visit Thailand (20,000 Baht of 670 USD per person/40,000 Baht or 1,340 USD per family)',
         'confirmed round trip air ticket' => 'confirmed round trip air ticket'];

         $listTouristvisa = ['letter of employment (for employee) or' => 'letter of employment (for employee) or',
         'company registration (for business owner) or' => 'company registration (for business owner) or',
         'guarantee/ invitation letter from company in Thailand (if any) or' => 'guarantee/ invitation letter from company in Thailand (if any) or',
         'receipt or invoice from past procurement (if any)' => 'receipt or invoice from past procurement (if any)'];

         $listTransitvisa = ['visa or travel document of which validity is no less than 6 months' => 'visa or travel document of which validity is no less than 6 months',
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
<div style="display: none">
 <?= $form->field($model, 'familytree_idfamilytree')->textInput() ?>
 </div>
    <?= $form->field($model, 'prefix')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.','Miss.' => 'Miss.'],['prompt'=>'Please select prefix']) ?>

    <?= $form->field($model, 'numberRequested')->textInput() ?>

        <?= $form->field($model, 'typeOfVisaRequest')->dropDownList(
        ArrayHelper::map(Typeofvisa::find()->all(), 'idtypeOfVisa','name'),
        [
            'prompt'=>'Please select type of visa',

        ]
    )->label('Type of Visa'); ?>

    <?= $form->field($model, 'visa_img')->fileInput() ?>

  <!--   <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>
<!-- 
    <?= $form->field($model, 'familyName')->textInput(['maxlength' => true]) ?>
 -->
    <?= $form->field($model, 'nationalityBirth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maritalStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TypeTravelDocument')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noPerson')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'issuedAt')->textInput(['maxlength' => true]) ?>
 --><?= $form->field($model, 'issuedAt')->widget(DatePicker::classname(), [
   
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>
       

<?= $form->field($model, 'dateIssue')->widget(DatePicker::classname(), [
   
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>


<?= $form->field($model, 'expiryDate')->widget(DatePicker::classname(), [
   
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>


  <div class="panel panel-default">
  <!-- <div class="panel-heading">Place Of Birth</div> -->
  <div class="panel-body">
    <?= $form->field($model, 'currentAddress')->textInput(['maxlength' => true]) ?>
<?php

if(!$model->isNewRecord){
    
    $script = <<< JS
$(document).ready(function(){
    $("select#visa-districtca").prop("disabled", false); 
    $("select#visa-townshipca").prop("disabled", false);
}); 
JS;
$this->registerJs($script, View::POS_END);
}

echo $form->field($model, 'stateCA', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(State::find()->all(), 'stateId', 'stateNameEN')
                , [
            'prompt' => 'Select State',
            'onChange' => '
                            
                            $.post("index.php?r=dep/district&id=' . '"+$(this).val(),function( data ){
                                $("select#visa-districtca").html( data );

                            if(data == "<option value>Select District</option>"){
                                        $("select#visa-districtca").prop("disabled", true);
                                        $("select#visa-districtca").val(""); 
                                        $("select#visa-townshipca").prop("disabled", true); 
                                        $("select#visa-townshipca").val(""); 
                                    }else{
                                        $("select#visa-townshipca").prop("disabled", true); 
                                        $("select#visa-townshipca").val("");
                                        $("select#visa-districtca").prop("disabled", false); 
                                        
                                    }
                                    
                        });',
        ]);
?>

<?php
echo $form->field($model, 'districtCA', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(District::find()->all(), 'districtId', 'districtNameEN')
                , [
            'prompt' => 'Select District',
            'disabled' => 'disabled',
            'onChange' => '
                            $.post("index.php?r=dep/township&id=' . '"+$(this).val(),function( data ){
                                $("select#visa-townshipca").html( data );

                            if(data == "<option value>Select Township</option>"){
                                        $("select#visa-townshipca").prop("disabled", true); 
                                        $("select#visa-townshipca").val(""); 
                                        
                                    }else{
                                        $("select#visa-townshipca").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>


<?php
echo $form->field($model, 'townshipCA', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(Township::find()->all(), 'townshipId', 'townshipNameEN')
                , [
            'prompt' => 'Select Township',
            'disabled' => 'disabled',
        ]);
?>


    </div>
</div>  
    <?= $form->field($model, 'telPerson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <div class="panel panel-default">
  <!-- <div class="panel-heading">Place Of Birth</div> -->
  <div class="panel-body">
    <?= $form->field($model, 'permanentAddress')->textInput(['maxlength' => true]) ?>
<?php

if(!$model->isNewRecord){

    $script = <<< JS
$(document).ready(function(){
    $("select#visa-districtpa").prop("disabled", false); 
    $("select#visa-townshippa").prop("disabled", false);
}); 
JS;
$this->registerJs($script, View::POS_END);
}

echo $form->field($model, 'statePA', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(State::find()->all(), 'stateId', 'stateNameEN')
                , [
            'prompt' => 'Select State',
            'onChange' => '
                            
                            $.post("index.php?r=dep/district&id=' . '"+$(this).val(),function( data ){
                                $("select#visa-districtpa").html( data );

                            if(data == "<option value>Select District</option>"){
                                        $("select#visa-districtpa").prop("disabled", true);
                                        $("select#visa-districtpa").val(""); 
                                        $("select#visa-townshippa").prop("disabled", true); 
                                        $("select#visa-townshippa").val(""); 
                                    }else{
                                        $("select#visa-townshippa").prop("disabled", true); 
                                        $("select#visa-townshippa").val("");
                                        $("select#visa-districtpa").prop("disabled", false); 
                                        
                                    }
                                    
                        });',
        ]);
?>

<?php
echo $form->field($model, 'districtPA', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(District::find()->all(), 'districtId', 'districtNameEN')
                , [
            'prompt' => 'Select District',
            'disabled' => 'disabled',
            'onChange' => '
                            $.post("index.php?r=dep/township&id=' . '"+$(this).val(),function( data ){
                                $("select#visa-townshippa").html( data );

                            if(data == "<option value>Select Township</option>"){
                                        $("select#visa-townshippa").prop("disabled", true); 
                                        $("select#visa-townshippa").val(""); 
                                        
                                    }else{
                                        $("select#visa-townshippa").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>


<?php
echo $form->field($model, 'townshipPA', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(Township::find()->all(), 'townshipId', 'townshipNameEN')
                , [
            'prompt' => 'Select Township',
            'disabled' => 'disabled',
        ]);
?>


    </div>
</div>  

    <?= $form->field($model, 'telPermanent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minorChildren')->textInput(['maxlength' => true]) ?>

  


           <?= $form->field($model, 'dateOfArrival')->widget(DatePicker::classname(), [
   
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

    <?= $form->field($model, 'traveling')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flightNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'durationOfProposedStay')->textInput(['maxlength' => true]) ?>




           <?= $form->field($model, 'dateOfPrevious')->widget(DatePicker::classname(), [
   
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>
    <?= $form->field($model, 'countriesForTravel')->textInput(['maxlength' => true]) ?>

  

     <?= $form->field($model, 'proposedAddressThai')->label('proposedAddressThai')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'regionthai_id')->dropDownList(
                ArrayHelper::map(Regionthai::find()->all(),'id','name'),
                ['prompt'=>'select region',
                    'onchange'=>'
                    $.post("index.php?r=dep/listregion&id='.'"+$(this).val(), function(data){
                        $("select#visa-provincethai_id").html(data);
                        });'
                ])->label('region'); ?>

    <?= $form->field($model, 'provincethai_id')->dropDownList(
        ArrayHelper::map(Provincethai::find()->all(), 'id','nameen'),
        [
            'prompt'=>'select province',
            'onchange'=>'
                    $.post("index.php?r=dep/listprovince&id='.'"+$(this).val(), function(data){
                        $("select#visa-districtthai_id").html(data);
                        });'
        ]
    )->label('Province Thai'); ?>


    <?= $form->field($model, 'districtthai_id')->dropDownList(
        ArrayHelper::map(districtthai::find()->all(), 'id','nameen'),
        [
            'prompt'=>'select district',
          'onchange'=>'
                    $.post("index.php?r=dep/listdistrict&id='.'"+$(this).val(), function(data){
                        $("select#visa-subdistrictthai_id").html(data);
                        });'
        ]
    )->label('District Thai'); ?>


        <?= $form->field($model, 'subdistrictthai_id')->dropDownList(
        ArrayHelper::map(subdistrictthai::find()->all(), 'id','nameen'),
        [
            'prompt'=>'select subdistrict',
        
        ]
    )->label('Subdistrict Thai'); ?>


    <?= $form->field($model, 'nameAddressLocal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telThai')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-6">
   <!--  <?= $form->field($model, 'applicationNoOfficial')->textInput(['maxlength' => true]) ?> -->

   <!--  <?= $form->field($model, 'visaNoOfficial')->textInput(['maxlength' => true]) ?>
 -->
  <!--   <?= $form->field($model, 'typeOfVisaOfficial')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'categoryOfEntries')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'numberOfEntriesOfficial')->textInput(['maxlength' => true]) ?> -->

   
              <!--  <?= $form->field($model, 'dateOfIssueOfficial')->widget(DatePicker::classname(), [
   
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?> -->

 <!--    <?= $form->field($model, 'feeOfficial')->textInput(['maxlength' => true]) ?> -->

<!--     <?= $form->field($model, 'expOfficial')->textInput(['maxlength' => true]) ?> -->

   <!--  <?= $form->field($model, 'documentsOfficial')->textInput(['maxlength' => true]) ?> -->

<!--     <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>
 -->

<?= $form->field($model, 'nameaddressGuarantor')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'telGuarantor')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'purposeOfVisit')->dropDownList(['Business' => 'Business', 'Tourism' => 'Tourism','Transit' => 'Transit','Diplomatic Official' => 'Diplomatic Official'],['prompt'=>'Please select purpose of visit']) ?>

    <?= $form->field($model, 'basic')->checkBoxList($listBasic, ['separator'=>'<br/>']) ?>
    <?= $form->field($model, 'applicant')->checkBoxList($listApplicant, ['separator'=>'<br/>']) ?>
    <?= $form->field($model, 'firsttime')->checkBoxList($listFirsttime, ['separator'=>'<br/>']) ?>
    <?= $form->field($model, 'touristvisa')->checkBoxList($listTouristvisa, ['separator'=>'<br/>']) ?>
    <?= $form->field($model, 'transitvisa')->checkBoxList($listTransitvisa, ['separator'=>'<br/>']) ?>

</div>

 <div class="clearfix"></div>
            <hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
