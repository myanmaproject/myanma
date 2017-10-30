<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\visaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Visa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idvisa',
            'prefix',
            'numberRequested',
            'typeOfVisaRequest',
            'firstName',
            // 'middleName',
            // 'familyName',
            // 'nationalityBirth',
            // 'maritalStatus',
            // 'TypeTravelDocument',
            // 'noPerson',
            // 'issuedAt',
            // 'dateIssue',
            // 'expiryDate',
            // 'currentAddress',
            // 'telPerson',
            // 'email:email',
            // 'permanentAddress',
            // 'telPermanent',
            // 'minorChildren',
            // 'dateOfArrival',
            // 'traveling',
            // 'flightNo',
            // 'durationOfProposedStay',
            // 'dateOfPrevious',
            // 'countriesForTravel',
            // 'proposedAddressThai',
            // 'nameAddressLocal',
            // 'telThai',
            // 'applicationNoOfficial',
            // 'visaNoOfficial',
            // 'typeOfVisaOfficial',
            // 'categoryOfEntries',
            // 'numberOfEntriesOfficial',
            // 'dateOfIssueOfficial',
            // 'feeOfficial',
            // 'expOfficial',
            // 'documentsOfficial',
            // 'picture',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'purposeOfVisit',
            // 'familytree_idfamilytree',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
