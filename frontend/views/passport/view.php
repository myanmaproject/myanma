<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Passport */

$this->title = $model->idpassport;

?>
<div class="box">
 <div class="box-header with-border">

  

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idpassport], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idpassport], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
                 <?= Html::a('Report', ['report', 'id' => $model->idpassport], ['class' => 'btn btn-primary']) ?>

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
            'created_at:dateTime',
            'updated_at:dateTime',
        ],
    ]) ?>

</div>
</div>