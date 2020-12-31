<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mystyle.css">
    <title><?php echo $this->title?></title>

</head>
<body>
<h1>Contact us</h1>
<form action="" method="post">
    <div class="contact">
    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>