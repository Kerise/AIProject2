<?php
/** @var $model \app\models\Invoice */
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
    <button type="submit" class="btn btn-primary">Submit</button>
        <div class="card-body">
            <h4 class="card-title">Pliki w trakcie wysyłania, nie zamykaj tego okna… <i class="fa fa-upload"></i></h4>
            <div class="progress m-t-20">
                <div class="progress-bar bg-success" style="width: 100%; height:15px;" role="progressbar">0%</div>
            </div>
        </div>
    </div>
<?php \app\Core\form\Form::end() ?>
</div>
