<?php
/**
 * Created by PhpStorm.
 * User: Poltava
 * Date: 12.09.2019
 * Time: 4:17
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Usersgames;
use app\models\Jackpot;

class TestController extends Controller
{
    public function summaZala()
    {
        $id = Usersgames::find()->max('id_game');
        $game = Usersgames::find()->where('id_game=:id_game', [':id_game' => $id])->one();
        if(!$game) {
            $summa_zala = 0;
        } elseif ( $game->summa_zala >= 500 ){
            $summa_zala = 0;
        } else {
            $summa_zala = $game->summa_zala;
        }
        return $summa_zala;
    }

    public function JackPot()
    {
        $id = Jackpot::find()->max('id');
        $jackpot = Jackpot::find()->where('id=:id', [':id' => $id])->one();
        if(!$jackpot) {
            $jackpot = 500;
        } elseif ($jackpot->rate == 1) {
            $jackpot = 500;
        } elseif ($jackpot->rate == 2) {
            $jackpot = $jackpot->jackpot + ($jackpot->jackpot / 2);
        }
        return $jackpot;
    }

    public function actionTest()
    {
        $this->layout = 'test';
        $JP = $this->Jackpot();
        $SZ = $this->summaZala();

        if ($SZ == 0) {
            return $this->render('test', ['JP' => $JP, 'SZ' => $SZ]);
        } else {
            return $this->render('show', ['JP' => $JP, 'SZ' => $SZ]);
        }
    }

}