<?php

namespace app\controllers;

use app\controllers\base\SecurityController;
use app\models\InputForm;
use app\models\Usersgames;
use app\models\JackpotForm;
use app\models\Jackpot;
//use yii\helpers\Url;

class GamesController extends SecurityController
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

    public function actionInput()
    {
        $model = new InputForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $newUserGame = new Usersgames();
                $newUserGame->id_pitBoss = \yii::$app->user->id;
                $newUserGame->id_player = $model->id_player;
                $newUserGame->points = $model->points;
                $newUserGame->summa_zala = $this->summaZala() + $model->points;
                $newUserGame->save();
                if ($newUserGame->summa_zala < 500){
                    return $this->refresh();
                } else {
                    return $this->redirect(['games/jackpot', 'id' => $newUserGame->id_player]);
                }
            }
        }

        return $this->render('input', compact('model'));
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
//            $jackpot = $jackpot->jackpot + ($jackpot->jackpot / 2);
            $jackpot = 500 + ($jackpot->jackpot / 2);
            $jackpot = round($jackpot, -1);
        }
        return $jackpot;
    }

    /**
     * @param $id
     * @return string
     */

    public function actionJackpot($id)
    {
        $model = new JackpotForm();
        $model->id_player = $id;

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $newJackpot = new Jackpot();
                $newJackpot->id_player = $model->id_player;
                $newJackpot->rate = $model->rate;
                $newJackpot->jackpot = $this->JackPot();
                if($newJackpot->save()) {
                    return $this->redirect('/games/input');
                } else {
                    return false;
                }
            }
        }

        return $this->render('jackpot', compact('model'));

    }

    public function Winner()
    {
        $id = Usersgames::find()->max('id_game');
        $game = Usersgames::find()->where('id_game=:id_game', [':id_game' => $id])->one();
        if (!$game) {
            $winner = 00000;
        } else {
            $winner = $game->id_player;
        }

        return $winner;
    }

    public function Win()
    {
        $id = Jackpot::find()->max('id');
        $jackpot = Jackpot::find()->where('id=:id', [':id' => $id])->one();
        if(!$jackpot) {
            $win = 000;
        }
        if ($jackpot->id_player != $this->Winner()) {
            $win = 000;
        }
        elseif ($jackpot->rate == 1){
            $win = $jackpot->jackpot;
        } elseif ($jackpot->rate == 2) {
            $win = $jackpot->jackpot / 2;
        }

        if (!empty($win)) {
            return $win;
        }
    }

    public function actionShow()
    {
        $this->layout = 'mylayout';
        $JP = $this->Jackpot();
        $SZ = $this->summaZala();
        $Id = $this->Winner();
        $win = $this->Win();


        if ($SZ == 0) {
            return $this->render('winner', ['win' => $win, 'Id' => $Id]);
        } else {
            return $this->render('showSZ', ['JP' => $JP, 'SZ' => $SZ]);
        }
    }

}