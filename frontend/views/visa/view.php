<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = $model->idvisa;

?>
<div class="box">
 <div class="box-header with-border">

  

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idvisa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idvisa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Report', ['report', 'id' => $model->idvisa], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                       [
                'attribute'=>'picture',
                'value'=>('visa/' . $model->picture),
                'format' => ['image',['width'=>'230','height'=>'200']],
            ],
            // 'idvisa',
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
           'created_at:dateTime',
            'updated_at:dateTime',
            'familytree_idfamilytree',
            'purposeOfVisit',
        ],
    ]) ?>

</div>
</div>