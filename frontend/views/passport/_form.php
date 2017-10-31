<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

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
</style>
<div class="passport-form">

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
    <td><input type="text" name="studied1[]"></td>
    <td><input type="text" name="studied1[]"></td>
    <td><input type="text" name="studied1[]"></td>
    <td><input type="text" name="studied1[]"></td>
    <td><input type="text" name="studied1[]"></td>
    <td><input type="text" name="studied1[]"></td>
  </tr>
  <tr>
    <td><input type="text" name="studied2[]"></td>
    <td><input type="text" name="studied2[]"></td>
    <td><input type="text" name="studied2[]"></td>
    <td><input type="text" name="studied2[]"></td>
    <td><input type="text" name="studied2[]"></td>
    <td><input type="text" name="studied2[]"></td>
  </tr>
  <tr>
    <td><input type="text" name="studied3[]"></td>
    <td><input type="text" name="studied3[]"></td>
    <td><input type="text" name="studied3[]"></td>
    <td><input type="text" name="studied3[]"></td>
    <td><input type="text" name="studied3[]"></td>
    <td><input type="text" name="studied3[]"></td>
  </tr>
</table>
</div>

    <?= $form->field($model, 'departmentTransferred')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departmentTransferredCurrent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsApplicant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSpouseApplicant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfChildrenApplicant')->textInput(['maxlength' => true]) ?>

<?php $model->test=['1','2','3'];

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
    <td align="center"><?= $form->field($model, 'test[0]')->textInput(['maxlength' => true]) ?></td>
    <td align="center"><?= $form->field($model, 'test[1]')->textInput(['maxlength' => true]) ?></td>
    <td align="center"><?= $form->field($model, 'test[2]')->textInput(['maxlength' => true]) ?></td>
    <td align="center"><input type="text" name="criminalcivillaw1[]"></td>
    <td align="center"><input type="text" name="criminalcivillaw1[]"></td>
    <td align="center"><input type="text" name="criminalcivillaw1[]"></td>
  </tr>
  <tr>
    <td><input type="text" name="criminalcivillaw2[]"></td>
    <td><input type="text" name="criminalcivillaw2[]"></td>
    <td><input type="text" name="criminalcivillaw2[]"></td>
    <td><input type="text" name="criminalcivillaw2[]"></td>
    <td><input type="text" name="criminalcivillaw2[]"></td>
    <td><input type="text" name="criminalcivillaw2[]"></td>
  </tr>

</table>
</div>
    <?= $form->field($model, 'detailOfSiblingsFather')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsMother')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailOfSiblingsSpouse')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'dateDeliveredPassport')->textInput() ?>
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
    <td><input type="text" name="whetheraboard1[]"></td>
    <td><input type="text" name="whetheraboard1[]"></td>
    <td><input type="text" name="whetheraboard1[]"></td>
    <td><input type="text" name="whetheraboard1[]"></td>
    <td><input type="text" name="whetheraboard1[]"></td>
  </tr>
  <tr>
    <td><input type="text" name="whetheraboard2[]"></td>
    <td><input type="text" name="whetheraboard2[]"></td>
    <td><input type="text" name="whetheraboard2[]"></td>
    <td><input type="text" name="whetheraboard2[]"></td>
    <td><input type="text" name="whetheraboard2[]"></td>
  </tr>
 
</table>
</div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
