<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Studied;
use app\models\Criminalcivillaw;
use app\models\Whetheraboard;
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

    <?= $form->field($model, 'familytree_idfamilytree')->textInput() ?>

    <?= $form->field($model, 'otherName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificationMark')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'sex')->radioList([
    '1' => 'Male',
    '2' => 'Female',
]); ?>

    <?= $form->field($model, 'presentOccupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presentOccupationAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'educationalQual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citizenshipSecCardNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eye')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hair')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouseName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouseOccupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouseOccupationAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subjectTravelled')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countryApplied')->textInput(['maxlength' => true]) ?>
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

    <?= $form->field($model, 'departmentTransferred')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departmentTransferredCurrent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsApplicant')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSpouseApplicant')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfChildrenApplicant')->textArea(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'detailOfSiblingsFather')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsMother')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsSpouse')->textArea(['maxlength' => true]) ?>


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

    <?= $form->field($model, 'passportNo')->textInput(['maxlength' => true]) ?>

    <?php
    echo '<label class="control-label">passportIssueDate</label>';
echo DatePicker::widget([
    'name' => 'passportIssueDate',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'orientation' => 'top right',
        'format' => 'mm/dd/yyyy',
        'autoclose' => true,
    ]
]); 
    ?>

    <?= $form->field($model, 'placeDeliveredPassport')->textInput(['maxlength' => true]) ?>

    <?php
    echo '<label class="control-label">dateDeliveredPassport</label>';
echo DatePicker::widget([
    'name' => 'dateDeliveredPassport',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'orientation' => 'top right',
        'format' => 'mm/dd/yyyy',
        'autoclose' => true,
    ]
]); 
    ?>


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



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>