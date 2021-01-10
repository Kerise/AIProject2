<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mystyle.css">
</head>

<?php
/** @var $model \app\models\Licence */
?>

<h1>Nowa licencja</h1>
<div class="licences">
    <?php $form = \app\Core\form\Form::begin('/uploadlicence', "POST","multipart/form-data") ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'nrinwentarz') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'nazwalicencji') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'kluczseryjny') ?>
    <?php echo $form->date_field($model, 'datazakupu') ?>
    <?php echo $form->field($model, 'idfaktury')?>
    <?php echo $form->date_field($model, 'datawsparcia')?>
    <?php echo $form->field($model, 'waznosclicencji')?>
    <?php echo $form->field($model, 'posiadaczlicencji')?>
    <?php echo $form->field($model, 'notatki')?>


    <input type="submit" value="Zapisz"/>
</div>
<?php \app\Core\form\Form::end() ?>
</div>
</html>
