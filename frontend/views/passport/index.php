<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PassportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Passports';
$this->params['breadcrumbs'][] = $this->title;
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
                        Html::a('Create Passports', ['create'], ['class' => 'btn btn-default']) ,
                ],
              
                '{toggleData}'
            ],
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
</div>