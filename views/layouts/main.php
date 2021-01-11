<?php
use \app\Core\Application;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./mystyle.css">
    <title><?php echo $this->title?></title>

</head>

<body>
<?php if(Application::isGuest()){header("Location:http://localhost:8080/login");}?>
<div id="menu">
    <a href="/home">
        <div class="option" id="home">Dodaj Fakture</div>
    </a>

    <a href="/addlicence">
        <div class="option" id="licence">Dodaj Licencje</div>
    </a>
    <a href="/licences">
        <div class="option">Licencje </div>
    </a>
    <a href="/">
        <div class="option">Faktury </div>
    </a>
    <?php if(Application::isGuest()):?>
    <?php else: ?>
    <?php $role = Application::getRole() ;
    if($role==1):
    ?>
        <a href="/register">
            <div class="option">Register </div>
        </a>


    <?php endif; ?>
        <a href="/logout">
            <div class="option2" id="logout">Welcome <?php echo Application::$app->user->getDisplayName()?> (Logout)</div>

        </a>
    <?php endif; ?>

</div>

<div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-succes">
            <?php echo Application::$app->session->getFlash('success') ?>
        </div>
        <?php endif; ?>
        {{content}}

</div>


</body>
</html>