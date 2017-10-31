<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeOfVisa */

$this->title = 'Update Type Of Visa: ' . $model->name;

?>
<div class="type-of-visa-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
