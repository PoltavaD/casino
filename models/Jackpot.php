<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jackpot".
 *
 * @property int $id
 * @property int $id_player
 * @property int $rate
 * @property double $jackpot
 */
class Jackpot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jackpot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_player', 'rate'], 'required'],
            [['id_player', 'rate'], 'integer'],
            [['jackpot'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_player' => 'Id Player',
            'rate' => 'Rate',
            'jackpot' => 'Jackpot',
        ];
    }
}
