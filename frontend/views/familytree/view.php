<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Familytree */

$this->title = $model->name;

?>
<div class="box">
 <div class="box-header with-border">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idfamilytree], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idfamilytree], [
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
            'idfamilytree',
            'name',
            'dateOfBirth',
            'placeOfBirth',
            'raceNationality',
            'nrc',
            'region',
            'occupation',
            'aliveOrDeath',
            'address',
            'father',
            'mother',
        ],
    ]) ?>

</div>
</div>