<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FamilytreeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Familytrees';
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
                        Html::a('Create Familytree', ['create'], ['class' => 'btn btn-default']) ,
                ],
              
                '{toggleData}'
            ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'familytree',
            'name',
            'dateOfBirth',
            'placeOfBirth',
            'raceNationality',
            // 'nrc',
            // 'region',
            // 'occupation',
            // 'aliveOrDeath',
            // 'address',
            // 'father',
            // 'mother',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>