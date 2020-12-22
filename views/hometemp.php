<?php
/** @var $model \app\models\Invoice */
?>

<h1>Nowa faktura</h1>
<?php $form = \app\Core\form\Form::begin('', "post") ?>
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

    <button type="submit" class="btn btn-primary">Submit</button>
<?php \app\Core\form\Form::end() ?>




