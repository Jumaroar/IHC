<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'userId',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date',
        
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'cookieBased',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'duration',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'error',
//    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ip',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'host',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'url',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'userAgent',
     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Ver','data-toggle'=>'tooltip'],
        
    ],

];   