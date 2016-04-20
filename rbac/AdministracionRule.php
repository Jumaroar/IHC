<?php
namespace app\rbac;

use yii\rbac\Rule;


class AdministracionRule extends Rule
{
    
     public $name = 'administracion';
    
    public function execute($user, $item, $params) {
        
    }

}

?>