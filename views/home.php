<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mystyle.css">
</head>

<?php
/** @var $model \app\models\Invoice */
?>

<h1>Nowa faktura</h1>
<h3>Welcome to fakturas maker </h3>
<div class="fakturas">
<?php $form = \app\Core\form\Form::begin('/upload', "POST","multipart/form-data") ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'nrfaktury') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'nrkontrahenta') ?>
    </div>
</div>
<?php echo $form->field($model, 'vatid') ?>
<?php echo $form->field($model, 'kwotanetto') ?>
<?php echo $form->field($model, 'kwotapodatkuvat')?>
<?php echo $form->field($model, 'kwotabrutto')?>


        <input type="submit" value="Wyślij pliki"/>
        <input type="file" class="custom-file-input"  name="image[]" multiple="">
    </div>
<?php \app\Core\form\Form::end() ?>
</div>
</html>

