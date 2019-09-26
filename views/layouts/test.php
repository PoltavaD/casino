<?php
use app\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta http-equiv="refresh" content="5">

<title><?= Html::encode($this->title) ?></title>



<style>
    body {
        /*background-image: url('/img/JP.png');*/
        max-width: 1920px;
        max-height: 1080px;
        margin: 0;
    }

    span {
        /*text-align: center;*/
        color: red;
        font-size: 100px;
        /*padding: */
    }
    .SZ {
        width: 490px;
        height: 140px;
        /*background-image: url("/img/bg_id.png");*/
        left: 705px;
        top: 416px;
        position: absolute;
        text-align: center;
        padding-top: 15px;
    }
    /*.Jackpot{*/
        /*background-image: url('/img/JP.png');*/
        /*max-width: 1920px;*/
        /*max-height: 1080px;*/
        /*margin: 0;*/
    /*}*/

    .JP {
        width: 570px;
        height: 185px;
        /*background-image: url("/img/bg_money.png");*/
        left: 678px;
        top: 807px;
        position: absolute;
        text-align: center;
        padding-top: 30px;
    }

</style>
</head>
<body>

<?= $content ?>

</body>
</html>