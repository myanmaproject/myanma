<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeOfVisa */

$this->title = 'Create Type Of Visa';
$this->params['breadcrumbs'][] = ['label' => 'Type Of Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-of-visa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
