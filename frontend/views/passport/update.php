<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Passport */

$this->title = 'Update Passport: ' . $model->idpassport;
$this->params['breadcrumbs'][] = ['label' => 'Passports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpassport, 'url' => ['view', 'id' => $model->idpassport]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="passport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
