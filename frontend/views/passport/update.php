<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Passport */

$this->title = 'Update Passport: ' . $model->idpassport;

?>
<div class="passport-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
