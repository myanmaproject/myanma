<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = 'Update Visa: ' . $model->idvisa;
$this->params['breadcrumbs'][] = ['label' => 'Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvisa, 'url' => ['view', 'idvisa' => $model->idvisa, 'familytree_idfamilytree' => $model->familytree_idfamilytree]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
          ]) ?>

</div>
