<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeOfVisa */

$this->title = 'Update Type Of Visa: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Of Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idtypeOfVisa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-of-visa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
