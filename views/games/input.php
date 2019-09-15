<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
<div class="row">
    <div class="col-lg-5">

        <?php $form = ActiveForm::begin(['id' => 'InputForm']); ?>

        <?= $form->field($model, 'id_player') ?>

        <?= $form->field($model, 'points') -> dropDownList([
            '3' => 'Flush',
            '4' => 'Full House',
            '5' => '4 of a King',
            '25' => 'Straight Flush',
            '50' => 'Royal Flush',
            '1' => 'BJ om',
//            '1' => '678 pm',
//            '1' => '777 pm',
//            '1' => '678 om',
//            '1' => '777 om',
            '2' => 'zero',
        ]) ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
                'name' => 'submit-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>