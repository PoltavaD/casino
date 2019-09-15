<?php

namespace app\models;

use yii\base\Model;


class InputForm extends Model
{
    public $id_player;
    public $points;

    public function rules()
    {
        return [
            [['id_player','points',], 'required'],
            [['id_player'], 'string', 'length' => 5],
            [['id_player'], 'integer',],
        ];
    }
}