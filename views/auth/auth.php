<?php

$this->title = 'auth';
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
<?= $form->field($model, 'login')->textInput(['placeholder' => 'Login']) ?>
<?= $form->field($model, 'pass')->textInput(['placeholder' => 'Password'])
    ->passwordInput()?>


<div class="form-group" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        <br>
    </div>
</div>

<?php ActiveForm::end();?>
