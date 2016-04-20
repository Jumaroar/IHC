<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii2tech\authlog\AuthLogIdentityBehavior;
/**
 * This is the model class for table "m_usuario".
 *
 * @property integer $Idusuario
 * @property integer $IdEmpleado
 * @property string $Username
 * @property string $password
 * @property string $ip
 * @property string $email
 * @property integer $IdEstado
 * @property string $auth_key
 *
 * @property MEmpleado $idEmpleado
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface 
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpleado', 'username', 'password', 'email', 'idEstado', 'auth_key','ip'], 'required'],
            [['idEmpleado', 'idEstado'], 'integer'],
            [['username', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 265],
            [['ip'], 'string', 'max' => 25],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }
    public function behaviors()
      {
          return [
              'authLog' => [
                  'class' => AuthLogIdentityBehavior::className(),
                  'authLogRelation' => 'authLogs',
                  'defaultAuthLogData' => function ($model) {
                      return [
                          'ip' => $_SERVER['REMOTE_ADDR'],
                          'host' => @gethostbyaddr($_SERVER['REMOTE_ADDR']),
                          'url' => $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                          'userAgent' => isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null,
                      ];
                  },
              ],
          ];
      }
      
       public function getAuthLogs()
    {
        return $this->hasMany(UserAuthLog::className(), ['userId' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'idEmpleado' => 'Id Empleado',
            'username' => 'Username',
            'password' => 'Password',
            'ip' => 'IP',
            'email' => 'Email',
            'idEstado' => 'Id Estado',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    
    public function getIdEmpleado()
    {
        return $this->hasOne(MEmpleado::className(), ['idEmpleado' => 'idEmpleado']);
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this->idUsuario;
    }
    
    public function getIp() {
        return $this->ip;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }
    
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
    
    public function validatePassword($password){
        return $this->password===$password;
    }
    #Funcion que valida la ip
    

    public static function findIdentityByAccessToken($token, $type = null) {
        
    }

}