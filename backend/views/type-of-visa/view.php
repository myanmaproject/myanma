<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypeOfVisa */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Of Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-of-visa-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
