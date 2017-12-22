<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\visa */

$this->title = 'Create Visa';

?>
<div class="visa-create">

  

    <?= $this->render('_form', [
        'model' => $model,
        'modelbasicducuments' => $modelbasicducuments,
          'modelregionthai' => $modelregionthai,
      
    ]) ?>

</div>
