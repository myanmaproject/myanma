<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Familytree */

$this->title = 'Update Familytree: ' . $model->name;

?>
<div class="familytree-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
