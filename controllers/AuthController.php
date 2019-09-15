<?php


namespace app\controllers;

use Yii;
use app\models\PitBosses;
use yii\web\Controller;
use app\models\LogForm;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $model = new LogForm();

        if ( $model->load(\Yii::$app->request->post()) ){
            $user = PitBosses::find()->where('login=:login', [':login' => $model->login])->one();
            if ( !$user ) {
                return $this->redirect('/auth/login');
            } elseif ($model->pass == $user->pass) {
                Yii::$app->user->login($user);
                return $this->redirect('/games/input');
            } else {
                return $this->redirect('/auth/login');
            }
        }
        return $this->render('auth', compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/auth/login');
    }
}