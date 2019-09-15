<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usersgames".
 *
 * @property int $id_game
 * @property int $id_pitBoss
 * @property int $id_player
 * @property int $points
 * @property int $summa_zala
 * @property int $jackpot
 * @property string $date
 *
 * @property PitBosses $pitBoss
 */
class Usersgames extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usersgames';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pitBoss', 'id_player', 'points'], 'required'],
            [['id_pitBoss', 'id_player', 'points', 'summa_zala', 'jackpot'], 'integer'],
            [['date'], 'safe'],
            [['id_pitBoss'], 'exist', 'skipOnError' => true, 'targetClass' => PitBosses::className(), 'targetAttribute' => ['id_pitBoss' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */

//    public function summaZala()
//    {
//        $id = Usersgames::find()->max('id_game');
//        $game = Usersgames::find()->where('id_game=:id_game', [':id_game' => $id])->one();
//        if(!$game) {
//            $summa_zala = 0;
//        } else {
//            $summa_zala = $game->summa_zala;
//        }
//        return $summa_zala;
//
//    }

    public function attributeLabels()
    {
        return [
            'id_game' => 'Id Game',
            'id_pitBoss' => 'Id Pit Boss',
            'id_player' => 'Id Player',
            'points' => 'Points',
            'summa_zala' => 'Summa Zala',
            'jackpot' => 'Jackpot',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPitBoss()
    {
        return $this->hasOne(PitBosses::className(), ['id' => 'id_pitBoss']);
    }
}
