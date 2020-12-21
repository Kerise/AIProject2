<h1>Home</h1>
<h3>Welcome to fakturas maker </h3>
<form action="" method="post">
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
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="submit" value="Wyślij pliki"/>
        <input type="file" class="custom-file-input"  name="image[]" multiple="">
    </form>
    <div class="card-body">
        <h4 class="card-title">Pliki w trakcie wysyłania, nie zamykaj tego okna… <i class="fa fa-upload"></i></h4>
        <div class="progress m-t-20">
            <div class="progress-bar bg-success" style="width: 0%; height:15px;" role="progressbar">0%</div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>