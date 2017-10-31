<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = 'Update Visa: ' . $model->idvisa;

?>
<div class="visa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
          ]) ?>

</div>
