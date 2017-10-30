<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Familytree */

$this->title = 'Update Familytree: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Familytrees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idfamilytree]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="familytree-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
