<?php
require_once 'vendor/autoload.php';

use App\Controller\AuthenticationController;
$router = new AltoRouter();

$router->setBasePath('/my-little-mvc');


// -------------------------------------Route en GET-------------------------------------
$router->map( 'GET', '/', function() {
    require './src/View/home.php';
});


$router->map( 'GET', '/login', function() {
    require './src/View/login.php';

});

$router->map( 'GET', '/register', function() {
    require './src/View/register.php';

});


// -------------------------------------Route en GET-------------------------------------



// -------------------------------------Route en POST-------------------------------------


$router->map( 'POST', '/', function() {

    $controller = new AuthenticationController();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $controller->loginController($email, $password);
	

});

// -------------------------------------Route en POST-------------------------------------





$match = $router->match();
if(is_array($match) && is_callable($match['target'])) {
	call_user_func_array($match['target'], $match['params']);
} else {
	// // no route was matched
	// header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
