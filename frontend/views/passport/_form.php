<?php
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Studied;
use app\models\Criminalcivillaw;
use app\models\Whetheraboard;

use yii\helpers\ArrayHelper;

use app\models\state;
use app\models\district;
use app\models\township;

use app\models\Spouseoccupationaddress;
use app\models\Presentoccupationaddress;
/* @var $this yii\web\View */
/* @var $model app\models\Passport */
/* @var $form yii\widgets\ActiveForm */

?>
<style>
table {
    border-collapse: collapse;
    background-color: white;
}

table, td, th {
    border: 1px solid black;
    text-align: center;
}

.form-group {
    margin-bottom: 0px;
}
</style>

<?php 

if(isset ($_GET["familytree_idfamilytree"])){
    if($_GET["familytree_idfamilytree"]!=null){

      $model->familytree_idfamilytree = $_GET["familytree_idfamilytree"];
    }
}
?>
<div class="box">
 <div class="box-header with-border">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
<div style="display: none">
    <?= $form->field($model, 'familytree_idfamilytree')->textInput() ?>
</div>
    <?= $form->field($model, 'otherName')->label('Other Name (Myanmar/English)')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificationMark')->label('Identification Mark')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'sex')->radioList([
    '1' => 'Male',
    '2' => 'Female',
]); ?>

    <?= $form->field($model, 'presentOccupation')->label('Present Occupation')->textInput(['maxlength' => true]) ?>


    <div class="panel panel-default">
  <!-- <div class="panel-heading">Place Of Birth</div> -->
  <div class="panel-body">
   <?= $form->field($model, 'presentOccupationAddress')->label('Present Address')->textInput(['maxlength' => true]) ?>



<?php

if(!$model->isNewRecord){
    $Presentoccupationaddress = Presentoccupationaddress::find()->where(['passport_idpassport' => $model->idpassport])->one();

   
    $model->statepresent = $Presentoccupationaddress->state;
    $model->districtpresent = $Presentoccupationaddress->district;
    $model->townshippresent = $Presentoccupationaddress->township;

    $script = <<< JS
$(document).ready(function(){
    $("select#passport-districtpresent").prop("disabled", false); 
    $("select#passport-townshippresent").prop("disabled", false);
}); 
JS;
$this->registerJs($script, View::POS_END);
}

echo $form->field($model, 'statepresent', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(State::find()->all(), 'stateId', 'stateNameEN')
                , [
            'prompt' => 'Select State',
            'onChange' => '
                            
                            $.post("index.php?r=dep/district&id=' . '"+$(this).val(),function( data ){
                                $("select#passport-districtpresent").html( data );

                            if(data == "<option value>Select District</option>"){
                                        $("select#passport-districtpresent").prop("disabled", true);
                                        $("select#passport-districtpresent").val(""); 
                                        $("select#passport-townshippresent").prop("disabled", true); 
                                        $("select#passport-townshippresent").val(""); 
                                    }else{
                                        $("select#passport-townshippresent").prop("disabled", true); 
                                        $("select#passport-townshippresent").val("");
                                        $("select#passport-districtpresent").prop("disabled", false); 
                                        
                                    }
                                    
                        });',
        ]);
?>

<?php
echo $form->field($model, 'districtpresent', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(District::find()->all(), 'districtId', 'districtNameEN')
                , [
            'prompt' => 'Select District',
            'disabled' => 'disabled',
            'onChange' => '
                            $.post("index.php?r=dep/township&id=' . '"+$(this).val(),function( data ){
                                $("select#passport-townshippresent").html( data );

                            if(data == "<option value>Select Township</option>"){
                                        $("select#passport-townshippresent").prop("disabled", true); 
                                        $("select#passport-townshippresent").val(""); 
                                        
                                    }else{
                                        $("select#passport-townshippresent").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>


<?php
echo $form->field($model, 'townshippresent', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(Township::find()->all(), 'townshipId', 'townshipNameEN')
                , [
            'prompt' => 'Select Township',
            'disabled' => 'disabled',
        ]);
?>


    </div>
</div>  

    <?= $form->field($model, 'educationalQual')->label('Educational Qualification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citizenshipSecCardNo')->label('Citizenship Scrutiny Card No.')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->label('Height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eye')->label('Eye Colour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hair')->label('Hair Colour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouseName')->label("Spouse's Name")->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouseOccupation')->label('Spouse Occupation')->textInput(['maxlength' => true]) ?>


  <div class="panel panel-default">
  <!-- <div class="panel-heading">Place Of Birth</div> -->
  <div class="panel-body">
    <?= $form->field($model, 'spouseOccupationAddress')->label('Spouse Occupation Address')->textInput(['maxlength' => true]) ?>



<?php

if(!$model->isNewRecord){
    $Spouseoccupationaddress = Spouseoccupationaddress::find()->where(['passport_idpassport' => $model->idpassport])->one();

   
    $model->statespouse = $Spouseoccupationaddress->state;
    $model->districtspouse = $Spouseoccupationaddress->district;
    $model->townshipspouse = $Spouseoccupationaddress->township;

    $script = <<< JS
$(document).ready(function(){
    $("select#passport-districtspouse").prop("disabled", false); 
    $("select#passport-townshipspouse").prop("disabled", false);
}); 
JS;
$this->registerJs($script, View::POS_END);
}

echo $form->field($model, 'statespouse', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(State::find()->all(), 'stateId', 'stateNameEN')
                , [
            'prompt' => 'Select State',
            'onChange' => '
                            
                            $.post("index.php?r=dep/district&id=' . '"+$(this).val(),function( data ){
                                $("select#passport-districtspouse").html( data );

                            if(data == "<option value>Select District</option>"){
                                        $("select#passport-districtspouse").prop("disabled", true);
                                        $("select#passport-districtspouse").val(""); 
                                        $("select#passport-townshipspouse").prop("disabled", true); 
                                        $("select#passport-townshipspouse").val(""); 
                                    }else{
                                        $("select#passport-townshipspouse").prop("disabled", true); 
                                        $("select#passport-townshipspouse").val("");
                                        $("select#passport-districtspouse").prop("disabled", false); 
                                        
                                    }
                                    
                        });',
        ]);
?>

<?php
echo $form->field($model, 'districtspouse', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(District::find()->all(), 'districtId', 'districtNameEN')
                , [
            'prompt' => 'Select District',
            'disabled' => 'disabled',
            'onChange' => '
                            $.post("index.php?r=dep/township&id=' . '"+$(this).val(),function( data ){
                                $("select#passport-townshipspouse").html( data );

                            if(data == "<option value>Select Township</option>"){
                                        $("select#passport-townshipspouse").prop("disabled", true); 
                                        $("select#passport-townshipspouse").val(""); 
                                        
                                    }else{
                                        $("select#passport-townshipspouse").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>


<?php
echo $form->field($model, 'townshipspouse', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(Township::find()->all(), 'townshipId', 'townshipNameEN')
                , [
            'prompt' => 'Select Township',
            'disabled' => 'disabled',
        ]);
?>


    </div>
</div>  

    <?= $form->field($model, 'subjectTravelled')->label('Subject to be travelled')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countryApplied')->label('Country to be applied')->textInput(['maxlength' => true]) ?>
</div>

<?php
if(!$model->isNewRecord){
          $Studied = Studied::find()->where(['passport_idpassport' => $model->idpassport])->all();
            if ($Studied!=null) {
                $i = 1;
                foreach ($Studied as $data) {
                    
                     if($i == 1){
                        $checkedFeatureArr1[0] = $data['yearFrom'];
                        $checkedFeatureArr1[1] = $data['yearTo'];
                        $checkedFeatureArr1[2] = $data['standardFrom'];
                        $checkedFeatureArr1[3] = $data['standardTo'];
                        $checkedFeatureArr1[4] = $data['nameSchool'];
                        $checkedFeatureArr1[5] = $data['townshipWardVillage'];
                        $model->studied1 = $checkedFeatureArr1;
                        $i++;
                    }
                    else if($i == 2){
                        $checkedFeatureArr2[0] = $data['yearFrom'];
                        $checkedFeatureArr2[1] = $data['yearTo'];
                        $checkedFeatureArr2[2] = $data['standardFrom'];
                        $checkedFeatureArr2[3] = $data['standardTo'];
                        $checkedFeatureArr2[4] = $data['nameSchool'];
                        $checkedFeatureArr2[5] = $data['townshipWardVillage'];
                        $model->studied2 = $checkedFeatureArr2;
                        $i++;
                    }
                     else if($i == 3){
                        $checkedFeatureArr3[0] = $data['yearFrom'];
                        $checkedFeatureArr3[1] = $data['yearTo'];
                        $checkedFeatureArr3[2] = $data['standardFrom'];
                        $checkedFeatureArr3[3] = $data['standardTo'];
                        $checkedFeatureArr3[4] = $data['nameSchool'];
                        $checkedFeatureArr3[5] = $data['townshipWardVillage'];
                        $model->studied3 = $checkedFeatureArr3;
                        $i++;
                    }
                    
                }
              
            }
}
?>

    <div style="padding-bottom:20px; padding-top:10px; ">

<table border="1" width="100%" >
    <tr><th colspan="6" align="left">Studied at School/Standard</th></tr>
  <tr>
    <th colspan="2" align="center">Year</th>
    <th colspan="2" align="center">Standard</th>
    <th colspan="2" align="center">University/College/School</th>
  </tr>
    <tr>
    <th align="center" width="15%">from</th>
    <th align="center" width="15%">to</th>
    <th align="center" width="15%">from</th>
    <th align="center" width="15%">to</th>
    <th align="center">Name</th>
    <th align="center">Township/Ward/Village</th>
  </tr>
  <tr>
    <td><?= $form->field($model, 'studied1[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied1[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied1[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied1[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied1[4]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied1[5]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>
  <tr>
    <td><?= $form->field($model, 'studied2[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied2[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied2[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied2[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied2[4]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied2[5]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>
  <tr>
    <td><?= $form->field($model, 'studied3[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied3[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied3[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied3[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied3[4]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'studied3[5]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>
</table>
</div>
 <div class="col-md-6">
    <?= $form->field($model, 'departmentTransferred')->label('Department transferred and served')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departmentTransferredCurrent')->label('Department transferred and served Current Designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsApplicant')->label('Name, Relationship, Occupation, Address of Siblings of Applicant')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSpouseApplicant')->label('Name, Occupation, Address of Spouse of Applicant')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfChildrenApplicant')->label('Name, Occupation, Address of Children of Applicant')->textArea(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'detailOfSiblingsFather')->label("Name, Occupation, Address of Siblings of Appplicant's Father")->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsMother')->label("Name, Occupation, Address of Siblings of Appplicant's Mother")->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsSpouse')->label("Name, Occupation, Address of Siblings of Appplicant's Spouse")->textArea(['maxlength' => true]) ?>
</div>

    <?php
if(!$model->isNewRecord){
          $Criminalcivillaw = Criminalcivillaw::find()->where(['passport_idpassport' => $model->idpassport])->all();
            if ($Criminalcivillaw!=null) {
                $i = 1;
                foreach ($Criminalcivillaw as $data) {
                    
                     if($i == 1){
                        $checkedFeatureArr1[0] = $data['act'];
                        $checkedFeatureArr1[1] = $data['punishment'];
                        $checkedFeatureArr1[2] = $data['court'];
                        $checkedFeatureArr1[3] = $data['periodFrom'];
                        $checkedFeatureArr1[4] = $data['periodTo'];
                        $checkedFeatureArr1[5] = $data['prison'];
                        $model->criminalcivillaw1 = $checkedFeatureArr1;
                        $i++;
                    }
                    else if($i == 2){
                        $checkedFeatureArr2[0] = $data['act'];
                        $checkedFeatureArr2[1] = $data['punishment'];
                        $checkedFeatureArr2[2] = $data['court'];
                        $checkedFeatureArr2[3] = $data['periodFrom'];
                        $checkedFeatureArr2[4] = $data['periodTo'];
                        $checkedFeatureArr2[5] = $data['prison'];
                        $model->criminalcivillaw2 = $checkedFeatureArr2;
                        $i++;
                    }
                    
                    
                }
              
            }
}
?>
 <div style="padding-bottom:20px;  padding-top:10px; ">
<table border="1" width="100%">
     <tr><th colspan="6" align="left">To fill-up the person who were committed the sentence under the Criminal/Civil Law</th></tr>
  <tr>
    <th align="center">Act</th>
    <th align="center">Punishment</th>
    <th align="center">Court</th>
    <th colspan="2" align="center">Period</th>
    <th align="center">Prison</th>
  </tr>
  <tr>
    <td align="center"><?= $form->field($model, 'criminalcivillaw1[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td align="center"><?= $form->field($model, 'criminalcivillaw1[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td align="center"><?= $form->field($model, 'criminalcivillaw1[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td align="center"><?= $form->field($model, 'criminalcivillaw1[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td align="center"><?= $form->field($model, 'criminalcivillaw1[4]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td align="center"><?= $form->field($model, 'criminalcivillaw1[5]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>
  <tr>
    <td><?= $form->field($model, 'criminalcivillaw2[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'criminalcivillaw2[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'criminalcivillaw2[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'criminalcivillaw2[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'criminalcivillaw2[4]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'criminalcivillaw2[5]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>

</table>

</div>
 <div class="col-md-6">   
    <p><b>To fill-up applied the Passport formerly</b></p>
    <?= $form->field($model, 'passportNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passportIssueDate')->widget(DatePicker::classname(), [
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
    ]
]); ?>
    <?= $form->field($model, 'placeDeliveredPassport')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'dateDeliveredPassport')->widget(DatePicker::classname(), [
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
    ]
]); ?>

</div>
    <?php
if(!$model->isNewRecord){
          $Whetheraboard = Whetheraboard::find()->where(['passport_idpassport' => $model->idpassport])->all();
            if ($Whetheraboard!=null) {
                $i = 1;
                foreach ($Whetheraboard as $data) {
                    
                     if($i == 1){
                        $checkedFeatureArr1[0] = $data['yearFrom'];
                        $checkedFeatureArr1[1] = $data['yearTo'];
                        $checkedFeatureArr1[2] = $data['subjectTravelled'];
                        $checkedFeatureArr1[3] = $data['country'];
                        $checkedFeatureArr1[4] = $data['remark'];
                        $model->whetheraboard1 = $checkedFeatureArr1;
                        $i++;
                    }
                    else if($i == 2){
                        $checkedFeatureArr2[0] = $data['yearFrom'];
                        $checkedFeatureArr2[1] = $data['yearTo'];
                        $checkedFeatureArr2[2] = $data['subjectTravelled'];
                        $checkedFeatureArr2[3] = $data['country'];
                        $checkedFeatureArr2[4] = $data['remark'];
                        $model->whetheraboard2 = $checkedFeatureArr2;
                        $i++;
                    }
                    
                    
                }
              
            }
}
?>

 

<div style="padding-bottom:20px; padding-top:10px; ">
<table width="100%" >
     <tr><th colspan="6" align="left">Whether went to aboard or not</th></tr>
  <tr>
    <th colspan="2" align="center">Year</th>
    <th rowspan="2" align="center">Subject to be travelled</th>
    <th rowspan="2" align="center">Country</th>
    <th rowspan="2" align="center">Remark</th>
  </tr>
    <tr>
    <th align="center" width="10%">from</th>
    <th align="center" width="10%">to</th>
    
  </tr>
  <tr>
    <td><?= $form->field($model, 'whetheraboard1[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard1[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard1[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard1[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard1[4]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>
  <tr>
    <td><?= $form->field($model, 'whetheraboard2[0]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard2[1]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard2[2]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard2[3]')->textInput(['maxlength' => true])->label(false) ?></td>
    <td><?= $form->field($model, 'whetheraboard2[4]')->textInput(['maxlength' => true])->label(false) ?></td>
  </tr>
 
</table>
</div>

<div class="clearfix"></div>
            <hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>