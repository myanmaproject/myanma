<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\familytree;
use kartik\widgets\DatePicker;
use app\models\state;
use app\models\district;
use app\models\township;

/* @var $this yii\web\View */
/* @var $model app\models\Familytree */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header with-border">

    <?php $form = ActiveForm::begin(); ?>


 <div class="col-md-6">


    <?= $form->field($model, 'familytree')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'dateOfBirth')->textInput(['maxlength' => true]) ?>
 --><?= $form->field($model, 'dateOfBirth')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
    ]
]); ?>


<div class="panel panel-default">
  <div class="panel-heading">Place Of Birth</div>
  <div class="panel-body">
    <?= $form->field($model, 'placeOfBirth')->textInput(['maxlength' => true,'placeholder' => "Address"])->label(false) ?>


<?php
echo $form->field($model, 'stateOfBirth', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(State::find()->all(), 'stateNameEN', 'stateNameEN')
                , [
            'prompt' => 'Select State',
            'onChange' => '
                            
                            $.post("index.php?r=dep/district&id=' . '"+$(this).val(),function( data ){
                                $("select#familytree-districtofbirth").html( data );

                            if(data == "<option value>Select District</option>"){
                                        $("select#familytree-districtofbirth").prop("disabled", true);
                                        $("select#familytree-districtofbirth").val(""); 
                                        $("select#familytree-townshipofbirth").prop("disabled", true); 
                                        $("select#familytree-townshipofbirth").val(""); 
                                    }else{
                                        $("select#familytree-districtofbirth").prop("disabled", false); 
                                        $("select#familytree-townshipofbirth").prop("disabled", true); 
                                        $("select#familytree-townshipofbirth").val(""); 
                                    }
                                    
                        });',
        ]);
?>

<?php
echo $form->field($model, 'districtOfBirth', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(District::find()->all(), 'districtNameEN', 'districtNameEN')
                , [
            'prompt' => 'Select District',
            'disabled' => 'disabled',
            'onChange' => '
                            $.post("index.php?r=dep/township&id=' . '"+$(this).val(),function( data ){
                                $("select#familytree-townshipofbirth").html( data );

                            if(data == "<option value>Select Township</option>"){
                                        $("select#familytree-townshipofbirth").prop("disabled", true); 
                                        $("select#familytree-townshipofbirth").val(""); 
                                        
                                    }else{
                                        $("select#familytree-townshipofbirth").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>


<?php
echo $form->field($model, 'townshipOfBirth', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(Township::find()->all(), 'townshipNameEN', 'townshipNameEN')
                , [
            'prompt' => 'Select Township',
            'disabled' => 'disabled',
        ]);
?>


    </div>
</div>  

    <?= $form->field($model, 'raceNationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nrc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aliveOrDeath')->dropDownList(['Alive' => 'Alive'
            , 'Death' => 'Death']
            ); ?>
<div class="panel panel-default">
  <div class="panel-heading">Address</div>
  <div class="panel-body">
    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label(false) ?>
<?php
echo $form->field($model, 'stateAddress', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(State::find()->all(), 'stateNameEN', 'stateNameEN')
                , [
            'prompt' => 'Select State',
            'onChange' => '
                            
                            $.post("index.php?r=dep/district&id=' . '"+$(this).val(),function( data ){
                                $("select#familytree-districtaddress").html( data );

                            if(data == "<option value>Select District</option>"){
                                        $("select#familytree-districtaddress").prop("disabled", true);
                                        $("select#familytree-districtaddress").val(""); 
                                        $("select#familytree-townshipaddress").prop("disabled", true); 
                                        $("select#familytree-townshipaddress").val(""); 
                                    }else{
                                        $("select#familytree-districtaddress").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>

<?php
echo $form->field($model, 'districtAddress', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(District::find()->all(), 'districtNameEN', 'districtNameEN')
                , [
            'prompt' => 'Select District',
            'disabled' => 'disabled',
            'onChange' => '
                            $.post("index.php?r=dep/township&id=' . '"+$(this).val(),function( data ){
                                $("select#familytree-townshipaddress").html( data );

                            if(data == "<option value>Select Township</option>"){
                                        $("select#familytree-townshipaddress").prop("disabled", true); 
                                        $("select#familytree-townshipaddress").val(""); 
                                        
                                    }else{
                                        $("select#familytree-townshipaddress").prop("disabled", false); 
                                    }
                                    
                        });',
        ]);
?>


<?php
echo $form->field($model, 'townshipAddress', ['template' => '<div class=\"\">{input}</div><div class=\"\">{error}</div>'])
        ->dropDownList(ArrayHelper::map(Township::find()->all(), 'townshipNameEN', 'townshipNameEN')
                , [
            'prompt' => 'Select Township',
            'disabled' => 'disabled',
        ]);
?>


</div>
</div>
                <?= $form->field($model, 'father')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(familytree::find()->all(),'idfamilytree','name'),
                'language' => 'th',
                'options' => ['placeholder' => 'father name'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>


                <?= $form->field($model, 'mother')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(familytree::find()->all(),'idfamilytree','name'),
                'language' => 'th',
                'options' => ['placeholder' => 'mother name'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
 <div class="clearfix"></div>
            <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
</div>