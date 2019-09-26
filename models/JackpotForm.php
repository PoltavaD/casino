<?php


namespace app\models;
use yii\base\Model;

class JackpotForm extends Model
{
    public $id_player;
    public $rate;

    public function rules()
    {
        return [
            [['id_player','rate',], 'required'],
            [['id_player'], 'string', 'length' => 5],
            [['rate'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_player' => 'Id Player',
            'rate' => 'Выиграл JP?',
            'jackpot' => 'Jackpot',
        ];
    }
}