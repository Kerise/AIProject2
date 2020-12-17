<?php
/** @var $model \app\models\User */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./loginStyle.css">
</head>
<body>
<div id="login-wrapper">
    <img src="./avatar.png" alt="">

    <div id="logowanie">
        <h1>Login</h1>
    </div>
    <div id="inputElements">
        <?php $form = \app\Core\form\Form::begin('', "post") ?>
        <?php echo $form->field($model, 'email') ?>
    </div>

    <div id="inputElements">
        <?php echo $form->field($model, 'password')->passwordField() ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php \app\Core\form\Form::end() ?>
</div>
</body>