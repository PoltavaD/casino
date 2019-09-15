<?php

namespace app\models;

use Yii;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "pit_bosses".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $pass
 *
 * @property Usersgames[] $usersgames
 */
class PitBosses extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pit_bosses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'pass'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['login', 'pass'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'login' => 'Login',
            'pass' => 'Pass',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersgames()
    {
        return $this->hasMany(Usersgames::className(), ['id_pitBoss' => 'id']);
    }

    public static function findIdentity($id)
    {
        return PitBosses::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
