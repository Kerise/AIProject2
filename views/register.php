<?php
/** @var $model \app\models\User */
?>
<div id="registerOtoczka">
<h1>Create account</h1>
<?php $form = \app\Core\form\Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Zarejestruj</button>
<?php \app\Core\form\Form::end() ?>
</div>
