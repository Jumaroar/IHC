<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;

/* @var $this yii\web\View */
/* @var $searchModel johnitvn\rbacplus\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac','Administrador de reglas');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="auth-item-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toggleDataOptions'=>[
                'all' => [
                   'icon' => 'resize-full',
                   'class' => 'btn btn-default',
                   'label' => Yii::t('rbac','Todo'),
                   'title' => Yii::t('rbac','Mostrar todos los datos')
               ],
               'page' => [
                   'icon' => 'resize-small',
                   'class' => 'btn btn-default',
                   'label' => Yii::t('rbac', 'Pagina'),
                   'title' => Yii::t('rbac','Mostrar primer pagina')                   
               ],
            ],
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> Yii::t('rbac','Crear una nueva regla'),'class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('rbac','Recargar') ]).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> '. $this->title,
                'after'=>false,
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrubModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
