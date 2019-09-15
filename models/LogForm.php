<?php


namespace app\models;
use yii\base\Model;


class LogForm extends Model
{
    public $login;
    public $pass;

    public function rules()
    {
        return [
            [['login','pass',], 'required'],
            [['login','pass',], 'trim'],
        ];
    }

}