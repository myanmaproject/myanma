<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\visaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visas';

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
                        Html::a('Create Visa', ['create'], ['class' => 'btn btn-default']) ,
                ],
              
                '{toggleData}'
            ],
    
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
</div>