<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Perfiles;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-fw fa-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$roles = Perfiles::find()->where(['type'=>1])->all();
$array = ArrayHelper::map($roles, 'name', 'name');


?>



<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
<!--        <p class="login-box-msg">Por favor introduce tu usuario y tu contraseña</p>-->

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Usuario')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Contraseña')]) ?>
        
        
        <?= $form
         ->field($perfil,'name')
         ->label(false)
         ->dropDownList($array,
                         ['prompt'=>'Seleccione su perfil'],
                         ['class'=>'form-control'])
         ?>
           
        
        <div class="row">
           
            <!-- /.col -->
            <div class="col-xs-12">
                <?= Html::submitButton(' Login', ['class' => 'fa fa-sign-in btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
        
        


    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
