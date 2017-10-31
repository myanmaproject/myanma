<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Familytree */

$this->title = 'Create Familytree';

?>
<div class="familytree-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
