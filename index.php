<?php

use App\Application;
use App\Controllers\HomeController;
use App\Controllers\StaticPageController;
use App\Controllers\RegisterController;
use App\Controllers\PostController;
use App\Controllers\LoginController;
use App\Controllers\UserController;
use App\Controllers\TestController;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$router = new Router();

$router->get('',      [HomeController::class, 'index']);
$router->get('post/*', [PostController::class, 'index']);
$router->get('user-contract', [StaticPageController::class, 'userContract']);


$router->get('registration', [RegisterController::class, 'index']);
$router->post('registration', [RegisterController::class, 'registration']);

$router->get('login', [LoginController::class, 'login']);
$router->post('login', [LoginController::class, 'auth']);
$router->get('logout', [LoginController::class, 'logout']);



$router->get('profile', [UserController::class, 'index']);
$router->post('profile', [UserController::class, 'update']);


$router->get('test', [TestController::class, 'index']);
$router->post('test', [TestController::class, 'testPost']);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
