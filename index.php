<?php
require_once 'vendor/autoload.php';

use App\Controller\AuthenticationController;
$router = new AltoRouter();

$router->setBasePath('/my-little-mvc');


// -------------------------------------Route en GET-------------------------------------
$router->map( 'GET', '/', function() {
    require './src/View/home.php';
},   'homePage');


$router->map( 'GET', '/login', function() {
    require './src/View/login.php';

}, 'loginForm');
 

$router->map( 'GET', '/register', function() {
    require './src/View/register.php';

}, 'registerForm');

$router->map( 'GET', '/shop', function() {
    require './src/View/shop.php';

}, 'shop');


// $router->map( 'GET', '/shop/[i:id]', function($id) {
//     require './src/View/shop.php';

// }, 'shopByID');




// $router->map( 'GET', '/shop', function() {
//     require './src/View/shop.php';

// }, 'shop');



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
