<?php
namespace app\rbac;

use yii\rbac\Rule;


class VentasRule extends Rule
{
    
     public $name = 'ventas';
    
    public function execute($user, $item, $params) {
        
    }

}

?>