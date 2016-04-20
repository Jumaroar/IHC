<?php

/* @var $this yii\web\View */


$this->title = 'Pos Web';
?>
<div class="site-index">
    
    <?php
            $admin = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
            print_r($admin);
    ?>
      
</div>
