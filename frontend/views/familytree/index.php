<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FamilytreeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Familytrees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familytree-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Familytree', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idfamilytree',
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
