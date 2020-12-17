<?php
use \app\Core\Application;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $this->title?></title>
</head>

<body>
<?php if(Application::isGuest()){header("Location:http://localhost:8080/login");}?>
<div id="menu">
    <a href="/">
        <div class="option">Home</div>
    </a>

    <a href="/contact">
        <div class="option">Contact </div>
    </a>
    <a href="/login">
        <div class="option">Login </div>
    </a>
    <?php if(Application::isGuest()):?>
    <?php else: ?>
    <?php $role = Application::getRole() ;
    if($role==1):
    ?>
        <a href="/register">
            <div class="option">Register </div>
        </a>
        <a href="/profile">
            <div class="option">Profile </div>
        </a>

    <?php endif; ?>
        <a href="/logout">
            <div class="option">Welcome <?php echo Application::$app->user->getDisplayName()?> </div>
            (Logout)
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