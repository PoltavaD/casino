<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\InputForm;
use app\models\Usersgames;
use app\models\JackpotForm;
use app\models\Jackpot;
use yii\helpers\Url;

class GamesController extends Controller
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
            $jackpot = 500 + ($jackpot->jackpot / 2);
            $jackpot = round($jackpot, -2);
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

    public function actionShow()
    {
        $this->layout = 'test';
        $JP = $this->Jackpot();
        $SZ = $this->summaZala();
        return $this->render('show', ['JP' => $JP, 'SZ' => $SZ]);
    }

}