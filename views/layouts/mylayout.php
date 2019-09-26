<?php
use app\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="refresh" content="3">
    <link href="/css/fonts.css" rel="stylesheet">

    <title><?= Html::encode($this->title) ?></title>

    <style>
        body {
            max-width: 1920px;
            max-height: 1080px;
            margin: 0;
        }

        span {
            /*font-family: 'TrajanPro3', serif;*/
            /*color: white;*/
            font-size: 120px;
            font-stretch: ultra-expanded;
        }
        .SZ {
            width: 490px;
            height: 140px;
            left: 705px;
            top: 416px;
            position: absolute;
            text-align: center;
            padding-top: 15px;
        }

        .JP {
            width: 570px;
            height: 185px;
            left: 678px;
            top: 807px;
            position: absolute;
            text-align: center;
            padding-top: 20px;
        }
        .Winner {
            width: 490px;
            height: 140px;
            left: 705px;
            top: 346px;
            position: absolute;
            text-align: center;
            padding-top: 15px;
        }
        .summa {
            font-family: 'TrajanPro3', serif;
            color: white;
            font-size: 120px;
            font-weight: bolder;
        }
        .jackpot {
            font-family: 'Muller Regular', serif;
            color: #6d4606;
            font-weight: bolder;
            font-size: 120px;
        }
        .WP {
            font-family: 'TrajanPro3', serif;
            color: white;
            font-size: 120px;
            font-weight: bolder;
        }


    </style>
</head>
<body>

<?= $content ?>

</body>
</html>