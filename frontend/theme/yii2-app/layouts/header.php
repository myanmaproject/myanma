<?php
use yii\helpers\Html;
use app\models\User;
use app\models\authassignment;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . 'WORK PERMIT' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu ">

            <ul class="nav navbar-nav">

              

                <li class="">
                    <a >
                        <span class="hidden-xs">
                            



<?php 
 if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
      ?>
<?php  echo "username : " ?><?= Yii::$app->user->identity->username; ?> /
 <?php $ff = authassignment::find()->where(['user_id'=> Yii::$app->user->identity->id])->one(); ?>
 <?= $ff->item_name; ?>
 <?php   } ?>


                        </span>
                    </a>
<!--                     <ul class="dropdown-menu">
                        <li class="user-footer">
                       
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul> -->
                </li>


<li class="">
                <!--     <a class="" href="/myanma/frontend/web/index.php?r=site%2Flogout" data-method="post">Sign out</a> -->

                        
                    <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => '']
                                ) ?>
<!--                     <ul class="dropdown-menu">
                        <li class="user-footer">
                       
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="/myanma/frontend/web/index.php?r=site%2Flogout" data-method="post">Sign out</a>                            </div>
                        </li>
                    </ul> -->
                </li>







                  <!-- 
                                <li class="dropdown user user-menu">
                    <a href="#" class="" data-toggle="dropdown">
                    
                            



  <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => '']
                                ) ?>


                        
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                       
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>     -->
            </ul>
        </div>
    </nav>
</header>




