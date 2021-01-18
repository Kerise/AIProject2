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
<div id="menu">
<?php if(Application::isGuest()){header("Location:http://localhost:8080/login");}
$role=Application::getRole();
if($role!=2):?>
    <a href="/home">
        <div class="option" id="home">Dodaj Fakture</div>
    </a>

    <a href="/addlicence">
        <div class="option" id="licence">Dodaj Licencje</div>
    </a>
    <a href="/adddevice">
        <div class="option" id="device">Dodaj Sprzęt</div>
    </a>
    <?php endif; ?>
    <a href="/licences">
        <div class="option">Licencje </div>
    </a>
    <a href="/">
        <div class="option">Faktury </div>
    </a>
    <a href="/devices">
        <div class="option">Sprzęt </div>
    </a>
    <?php if(Application::isGuest()):?>
    <?php else: ?>
    <?php $role = Application::getRole() ;
    if($role==1):
    ?>
        <a href="/register">
            <div class="option">Rejestracja </div>
        </a>


    <?php endif; ?>
        <a href="/logout">
            <div class="option2" id="logout">Uszanowanie <?php echo Application::$app->user->getDisplayName()?> (Logout)</div>
        </a>
        <div class="option2">
        <?php $role=Application::getRole();
        if($role==0)echo "U";
        elseif($role==1)echo "A";
        elseif($role==2)echo "S";
        ?>
        </div>
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