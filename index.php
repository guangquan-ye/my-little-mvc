<?php
require_once 'vendor/autoload.php';

use App\Controller\AuthenticationController;
use App\Controller\ShopController;
$shopController = new ShopController();
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


$router->map( 'GET', '/logout', function() {
    $controller = new AuthenticationController();
    $controller->logout();

}, 'logout');


$router->map('GET', '/shop/[i:id]/[a:type]', function($id, $type) {
    $shopController = new ShopController();
    $shopController->showProduct($id, $type);

    
    require './src/View/product.php';
}, 'shopByID');




// -------------------------------------Route en GET-------------------------------------



// -------------------------------------Route en POST-------------------------------------


$router->map( 'POST', '/login', function() {

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
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
