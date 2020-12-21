<?php
/** @var $model \app\models\Invoice */
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<h1>Home</h1>
<h3>Welcome to fakturas maker </h3>
    <div class="form-group">
        <label>Numer Faktury</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="form-group">
        <label>Nazwa kontrahenta</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>VAT ID</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>kwota netto</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>kwota podatku VAT</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>kwota brutto</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>kwotą netto[waluta]</label>
        <input type="text" name="email" class="form-control">
    </div>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        <input type="submit" value="Wyślij pliki"/>
        <input type="file" class="custom-file-input"  name="image[]" multiple="">
    </form>
    <div class="card-body">
        <h4 class="card-title">Pliki w trakcie wysyłania, nie zamykaj tego okna… <i class="fa fa-upload"></i></h4>
        <div class="progress m-t-20">
            <div class="progress-bar bg-success" style="width: 100%; height:15px;" role="progressbar">0%</div>
        </div>
    </div>
<script>

    $('form').submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        var progressval = Math.round(percentComplete*100)+'%';
                        $('.progress-bar').css('width', progressval); /* Animacja paska postępu */
                        $('.progress-bar').text(progressval);  /* Zmiana tekstu z procentami */
                    }
                }, false);
                return xhr;
            },
            url:"/upload",
            method:"POST",
            data: formData,
            contentType:false,
            processData:false,
            enctype: 'multipart/form-data',
            success:function(output){
                alert("dupa123");
            }
        });
    });
</script>