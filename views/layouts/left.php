
<aside class="main-sidebar">
    
        <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    
                    [
                      'label'=>'Administración',  
                      'visible' => conseguirRoles('Administrador') || conseguirRoles('Sub-Administrador'),
                      'url'=>'#',
                      'items'=>[
                         ['label' => 'Asignación de caja',
                             'icon' => 'glyphicon glyphicon-list-alt',
                             'url' => ['#'],  
                             'visible' => conseguirPermisos('asignar'),
                         ],                                       
                         ['label' => 'Apertura de caja',
                             'icon' => 'fa fa-unlock', 'url' => ['#'],  
                             'visible' => conseguirPermisos('abrir caja')
                        ],
                         ['label' => 'Cierre de caja',
                          'icon' => 'fa fa-lock',
                          'url' => ['#'],
                          'visible' => conseguirPermisos('cerrar caja')], 
                         ['label' => 'Registros',
                          'icon' => 'fa fa-file-text',
                          'url' => ['/registros'],
                          'visible' => conseguirPermisos('verLogs')],
                        ],
                    ],                      
                ],            
            ]
        ) ?>
    
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                
                'items' => [
                   [
                    'label' => 'Ventas',
                    'visible' => !Yii::$app->user->isGuest,
                        'items'=>[
                            ['label' => 'Cotización','icon' => 'fa fa-calculator', 'url' => ['#'],  'visible' => conseguirPermisos('cotizar')],
                            ['label' => 'Facturación','icon' => 'fa fa-dollar', 'url' => ['#'],  'visible' => conseguirPermisos('facturar')],
                        ], 
                    ]
                ],            
            ]
        ) ?>
            
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                
                'items' => [
                   [
                    'label' => 'Cuenta',
                    'visible' => !Yii::$app->user->isGuest,
                        'items'=>[
                            ['label' => 'Logout', 'url' => ['/site/logout'],
                                   'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out fa-fw"></i>&nbsp;{label}</a>',
                                   'visible' => !Yii::$app->user->isGuest]
                        ], 
                    ]
                ],            
            ]
        ) ?>    
        
        <?= dmstr\widgets\Menu::widget(
            [
                
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Login','icon' => 'fa fa-sign-in', 'url' => ['site/login'],  'visible' => Yii::$app->user->isGuest],
                ],            
            ]
        ) ?>
            
            <?php 
              
                function getUser()
                {
                    if ($this->_user === false) {
                        $this->_user = Usuario::findByUsername($this->username);
                    }

                        return $this->_user;
                }
                
                
                function conseguirPermisos($nombreP){
                    
                    $idUsuario = Yii::$app->user->getId();
                    
                    $permisos=Yii::$app->authManager->getPermissionsByUser($idUsuario);
                    
                    if (\yii\helpers\ArrayHelper::getValue($permisos, $nombreP)) {
                        
                        return true;
                    
                    } 
                        else {
                            
                                return false;
                                
                        }
                }
                
                function conseguirRoles($nombreP){
                    
                    $idUsuario = Yii::$app->user->getId();
                    
                    $roles=Yii::$app->authManager->getRolesByUser($idUsuario);
                    
                    if (\yii\helpers\ArrayHelper::getValue($roles, $nombreP)) {
                        
                        return true;
                    
                    } 
                        else {
                            
                                return false;
                                
                        }
                }
            ?>
    </section>

</aside>
