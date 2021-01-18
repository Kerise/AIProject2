<?php

use app\controllers\SiteController;
use app\Core\Application;
use \app\controllers\AuthController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);



$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->post('/contact',[SiteController::class,'handleContact']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);
$app->router->get('/logout',[AuthController::class,'logout']);
$app->router->get('/profile',[AuthController::class,'profile']);
$app->router->post('/upload',[AuthController::class,'upload']);
$app->router->get('/home',[AuthController::class,'home']);
$app->router->get('/',[AuthController::class,'tables']);
$app->router->get('/addlicence',[AuthController::class,'addlicence']);
$app->router->post('/uploadlicence',[AuthController::class,'uploadlicence']);
$app->router->get('/licences',[AuthController::class,'licences']);
$app->router->get('/delete',[AuthController::class,'delete']);
$app->router->post('/edit',[AuthController::class,'edit']);
$app->router->get('/documents',[AuthController::class,'tables']);
$app->router->get('/adddevice',[AuthController::class,'adddevice']);
$app->router->post('/uploaddevice',[AuthController::class,'uploaddevice']);
$app->router->get('/devices',[AuthController::class,'devices']);


$app->run();
