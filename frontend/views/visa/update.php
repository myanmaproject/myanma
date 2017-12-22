<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = 'Update Visa: ' . $model->firstName;

?>
<div class="visa-update">

  

    <?= $this->render('_form', [
        'model' => $model,
         
          ]) ?>

</div>
