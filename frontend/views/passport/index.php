<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PassportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Passports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Passport', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpassport',
            'familytree_idfamilytree',
            'otherName',
            'identificationMark',
            'sex',
            // 'presentOccupation',
            // 'presentOccupationAddress',
            // 'educationalQual',
            // 'citizenshipSecCardNo',
            // 'height',
            // 'eye',
            // 'hair',
            // 'spouseName',
            // 'spouseOccupation',
            // 'spouseOccupationAddress',
            // 'subjectTravelled',
            // 'countryApplied',
            // 'departmentTransferred',
            // 'departmentTransferredCurrent',
            // 'detailOfSiblingsApplicant',
            // 'detailOfSpouseApplicant',
            // 'detailOfChildrenApplicant',
            // 'detailOfSiblingsFather',
            // 'detailOfSiblingsMother',
            // 'detailOfSiblingsSpouse',
            // 'passportNo',
            // 'passportIssueDate',
            // 'placeDeliveredPassport',
            // 'dateDeliveredPassport',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
