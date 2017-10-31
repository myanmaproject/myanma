<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Passport */

$this->title = $model->idpassport;
$this->params['breadcrumbs'][] = ['label' => 'Passports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idpassport], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idpassport], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpassport',
            'familytree_idfamilytree',
            'otherName',
            'identificationMark',
            'sex',
            'presentOccupation',
            'presentOccupationAddress',
            'educationalQual',
            'citizenshipSecCardNo',
            'height',
            'eye',
            'hair',
            'spouseName',
            'spouseOccupation',
            'spouseOccupationAddress',
            'subjectTravelled',
            'countryApplied',
            'departmentTransferred',
            'departmentTransferredCurrent',
            'detailOfSiblingsApplicant',
            'detailOfSpouseApplicant',
            'detailOfChildrenApplicant',
            'detailOfSiblingsFather',
            'detailOfSiblingsMother',
            'detailOfSiblingsSpouse',
            'passportNo',
            'passportIssueDate',
            'placeDeliveredPassport',
            'dateDeliveredPassport',
        ],
    ]) ?>

</div>
