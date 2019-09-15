<?php

namespace app\models;

/* @var $this \yii\web\View */
/* @var $id int */
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
<div class="row">
    <div class="col-lg-5">

        <?php $form = ActiveForm::begin(['id' => 'JackpotForm']); ?>

        <?= $form->field($model, 'id_player') ?>

        <?= $form->field($model, 'rate') -> dropDownList([
            '1' => 'да',
            '2' => 'нет',
        ]) ?>


        <div class="form-group">
            <?= Html::submitButton('JackPot', ['class' => 'btn btn-danger',
                'name' => 'submit-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>