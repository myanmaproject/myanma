<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\grid\GridView;
use app\models\FamilytreeSearch;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Find People';

?>  
<div class="box">
    <div class="box-header with-border">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

      


        <?php ActiveForm::end(); ?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idfamilytree',
            'name',
            'nrc',
         
[
   'class' => 'kartik\grid\ActionColumn',
   'template'    => '{view}',
   'controller' => 'familytree',
     'header' => 'Familytree',
    'buttons' => [
                        'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, 
                        [
                            'title' => Yii::t('app', 'view'),
                        ]);
                    }
                ],
],



[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{leadView}',
    'header' => 'VISA',
    'buttons' => [
       'leadView' => function ($url, $model) {
           $url = Url::to(['visa/viewfind', 'id' => $model->idfamilytree]);
          return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, ['title' => 'view']);
       },
       
    ]
]
,

[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{leadView}',
    'header' => 'Passport',
    'buttons' => [
       'leadView' => function ($url, $model) {
           $url = Url::to(['passport/viewfind', 'id' => $model->idfamilytree]);
          return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, ['title' => 'view']);
       },
       
    ]
]





        ],
    ]); ?>

          </div>

        </div>
     
      