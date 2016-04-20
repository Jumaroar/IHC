<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">PoS</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                    <!--Numero de Mensajes-->
                        <span class="label label-success"></span>
                    </a>
                    
                </li>
                <!--Notificaciones-->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                <!--Numero de notificaciones-->
                        <span class="label label-warning"></span>
                    </a>
                    
                </li>
                <!-- Tareas -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                <!-- Numero de Tareas -->
                        <span class="label label-danger"></span>
                    </a>
                </li> 
                <li>
                
                    
                <!-- Boton de logout -->
                <?php if(!Yii::$app->user->isGuest) : ?>
                   <?= Html::a(                         
                            'Logout ('  . Yii::$app->user->identity->username .')',
                            ['/site/logout'],
                            ['data-method' => 'post', 'class' => 'btn btn-block fa fa-sign-out btn-primary btn-flat']
                    ) ?> 
                <?php else :?>
                        <?= Html::a(                         
                            ' Login',
                            ['/site/login'],
                            ['class'=>'fa fa-sign-in']
                        ) ?> 
                <?php endif;?>
                
                    
                </li>   
                    
                
   <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
