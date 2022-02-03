<?php

use App\Application;
use App\Controllers\HomeController;
use App\Controllers\StaticPageController;
use App\Controllers\PostController;
use App\Controllers\UserController;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$router = new Router();

$router->get('',      [HomeController::class, 'index']);
$router->get('profile', [StaticPageController::class, 'profile']);
$router->get('post/*', [PostController::class, 'index']);
$router->get('test/*/test2/*', [StaticPageController::class, 'test']);


$router->get('registration', [UserController::class, 'indexRegistration']);
$router->post('registration', [UserController::class, 'registration']);

$router->get('login', [UserController::class, 'login']);
$router->post('login', [UserController::class, 'verification']);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
