<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userauthlog".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $date
 * @property integer $cookieBased
 * @property integer $duration
 * @property string $error
 * @property string $ip
 * @property string $host
 * @property string $url
 * @property string $userAgent
 */
class Userauthlog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userauthlog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'cookieBased', 'duration'], 'integer'],
            [['date'], 'safe'],
            [['error', 'ip', 'host', 'url', 'userAgent'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'Id Usuario',
            'date' => 'Fecha',
            'cookieBased' => 'Cookie Based',
            'duration' => 'Duracion',
            'error' => 'Error',
            'ip' => 'Ip',
            'host' => 'Host',
            'url' => 'Url',
            'userAgent' => 'Navegador',
        ];
    }
}
