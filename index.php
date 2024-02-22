<?php

use App\Controller\AuthenticationController;

require_once 'vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/my-little-mvc');

$router->map('GET', '/', function () {
    require_once "./home.php";
});

$router->map('GET', '/register', function () {
    require_once "./register.php";
});

$router->map('POST', '/register', function () {
    $user= new AuthenticationController();
    $user->registerController($_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['role']);
}); 

$router->map('GET', '/login', function () {
    require_once "./login.php";
});

$router->map('POST', '/login', function () {
    $user= new AuthenticationController();
    $user->loginController($_POST['email'], $_POST['password']);
   
});


$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}