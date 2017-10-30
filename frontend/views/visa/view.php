<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = $model->idvisa;
$this->params['breadcrumbs'][] = ['label' => 'Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idvisa' => $model->idvisa, 'familytree_idfamilytree' => $model->familytree_idfamilytree], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idvisa' => $model->idvisa, 'familytree_idfamilytree' => $model->familytree_idfamilytree], [
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
            'idvisa',
            'prefix',
            'numberRequested',
            'typeOfVisaRequest',
            'firstName',
            'middleName',
            'familyName',
            'nationalityBirth',
            'maritalStatus',
            'TypeTravelDocument',
            'noPerson',
            'issuedAt',
            'dateIssue',
            'expiryDate',
            'currentAddress',
            'telPerson',
            'email:email',
            'permanentAddress',
            'telPermanent',
            'minorChildren',
            'dateOfArrival',
            'traveling',
            'flightNo',
            'durationOfProposedStay',
            'dateOfPrevious',
            'countriesForTravel',
            'proposedAddressThai',
            'nameAddressLocal',
            'telThai',
            'applicationNoOfficial',
            'visaNoOfficial',
            'typeOfVisaOfficial',
            'categoryOfEntries',
            'numberOfEntriesOfficial',
            'dateOfIssueOfficial',
            'feeOfficial',
            'expOfficial',
            'documentsOfficial',
            'picture',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'purposeOfVisit',
            'familytree_idfamilytree',
        ],
    ]) ?>

</div>
