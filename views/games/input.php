<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
<div class="row">
    <div class="col-lg-5">

        <?php $form = ActiveForm::begin(['id' => 'InputForm']); ?>

        <?= $form->field($model, 'id_player') ?>

        <?= $form->field($model, 'points') -> dropDownList([
            '1' => 'Str, AR, BJ om',
            '2' => 'Flush',
            '3' => 'Full House',
            '5' => '4 of a King',
            '25' => 'Straight Flush',
            '50' => 'Royal Flush',
        ]) ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
                'name' => 'submit-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<br>
<br>
<div>
    <a class="btn btn-warning" href="/games/show/" role="button" target="_blank">JackPot</a>
</div>