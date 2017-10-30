<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Familytree */

$this->title = 'Create Familytree';
$this->params['breadcrumbs'][] = ['label' => 'Familytrees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familytree-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
