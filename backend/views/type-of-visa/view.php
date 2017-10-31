<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypeOfVisa */

$this->title = $model->name;

?>
<div class="type-of-visa-view">

<div class="box">
    <div class="box-header with-border">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idtypeOfVisa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idtypeOfVisa], [
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
            'idtypeOfVisa',
            'name',
        ],
    ]) ?>

</div>
</div>