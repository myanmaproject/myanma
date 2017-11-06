<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = 'Update Visa: ' . $model->idvisa;

?>
<div class="visa-update">

  

    <?= $this->render('_form', [
        'model' => $model,
          ]) ?>

</div>
