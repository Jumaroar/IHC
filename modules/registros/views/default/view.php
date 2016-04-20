<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userauthlog */
?>
<div class="userauthlog-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userId',
            'date',            
            'ip',
            'host',
            'url:url',
            'userAgent',
        ],
    ]) ?>

</div>
