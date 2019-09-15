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
        ];
    }
}