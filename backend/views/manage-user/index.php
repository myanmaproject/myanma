<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Breadcrumbs;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');

?>
<div class="box">
    <div class="box-header with-border">

        <div class="">
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
           'panel'=>[
                'before'=>' '
            ],
             'toolbar' => [
            [
                'content'=>
                    Html::a('Create User', ['create'], ['class' => 'btn btn-default']) ,
            ],
            '{export}',
            '{toggleData}'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
             //'status',
             [
               'attribute'=>'status',
               'format'=>'html',
               'filter'=>$searchModel->itemStatus,
               'value'=>function($model){
                 return $model->statusName=='Active' ?'<span class="text-success">'.$model->statusName.'</span>' : $model->statusName ;
               }
             ],
             'created_at:dateTime',
            // 'updated_at',

            [
              'class' => 'yii\grid\ActionColumn',
              'options'=>['style'=>'width:120px;'],
              'buttonOptions'=>['class'=>'btn btn-default'],
              'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
           ],
        ],
    ]); ?>

</div>