<?php

namespace app\models;

use Yii;
use yii\base\Model;
use kartik\alert\Alert;
use app\models\Usuario;
/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model   
{
    public $username;
    public $password;
    public $ip;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // validacion de la ip mediante validarIp()
            ['ip', 'validarIp'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Usuario o Contraseña incorrecta.');
            }
        }
    }
    
    #funcion para conseguir la ip del usuario           
    function conseguirIp()  
    {  
        $ip = Yii::$app->request->userIp;    
        
         return $ip; 
    }  
    #funcion para comparar la ip del usuario con la ip asignada a el
    public function validarIp() {
       
        $usuarioActual= $this->getUser();
       
        if($this->conseguirIp() == $usuarioActual->ip){
            return true;
        }             
    }
    
    function conseguirPerfil()
    {
        $perfil=$_POST ['Perfiles']['name'];
        return $perfil;
    }
    
    public function validarPerfil(){
        $perfilUsuario= $this->getUser();
        $array = Yii::$app->authManager->getRolesByUser($perfilUsuario->id);
            foreach ($array as $arrays){
                $perfil = $arrays->name;
            }
        if($this->conseguirPerfil() == $perfil){
            return true;
        }
    }
   
    #Funcion para volver al index
    public function refresh() {
        return Yii::$app->getResponse()->redirect('site/login');
    }
    
    #Realizo el logueo
    public function login()
    {       
           $usuarioActual = $this->getUser();
            if(empty($usuarioActual)){
              echo Alert::widget([
                    'type' => Alert::TYPE_DANGER,
                    'body' => 'Por favor llene todos los campos.',
                    'showSeparator' => true,
                    'delay' => 8000
                ]);
            }   
        #Si los datos son validos se realiza el login y se da un mensaje de bienvenida
       else{     
            if ($this->validarIp() && $this->validarPerfil() && $this->validate()) {               
                   Yii::$app->session->setFlash('success', 'Bienvenido/a! '  . $usuarioActual->username .'');
                   return Yii::$app->user->login($this->getUser());              
            }
            #en caso que la ip no sea valida para este usuario se regresara al index y se mostrara un mensaje de error
            if (!$this->validarIp()) {
                echo Alert::widget([
                    'type' => Alert::TYPE_DANGER,
                    'body' => 'Usted no esta autorizado para iniciar sesión en este equipo.',
                    'showSeparator' => true,
                    'delay' => 5000
                ]);
            }
            if (!$this->validarPerfil()) {
                echo Alert::widget([
                    'type' => Alert::TYPE_DANGER,
                    'body' => 'El perfil seleccionado no es correcto.',
                    'showSeparator' => true,
                    'delay' => 5000
                ]);
            }
        }
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
   
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuario::findByUsername($this->username);
        }

        return $this->_user;
    }
}
