<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypeOfVisaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Of Visas';

?>
<div class="box">
 <div class="box-header with-border">

  

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'panel'=>[
                'before'=>' '
            ],
            'toolbar' => [
                [
                    'content'=>
                        Html::a('Create Type of VISA', ['create'], ['class' => 'btn btn-default']) ,
                ],
              
                '{toggleData}'
            ],
     
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtypeOfVisa',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
