<?php
use App\Controller\AuthenticationController;

require_once 'vendor/autoload.php';
session_start();

$router = new AltoRouter(); 
$router->setBasePath('/my-little-mvc'); 

$router->map('GET', '/', function() { 
    require_once "./home.php"; 
}); 

$router->map('GET', '/b', function() { 
    require_once "./boubacar.php"; 
}); 
// $router->map('POST', '/submit', function() { 
    // $exemple = $_POST['exemple']; 
    // echo "Donnée reçue : " . htmlspecialchars($exemple); 
    // }); 
    
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

    $router->map('GET', '/profile', function(){
        if (!isset($_SESSION['user']['id'])) {
            // Redirection vers la connexion si l'utilisateur n'est pas connecté
            //echo "erreur de connexion";
            header("Location: /my-little-mvc/login");
            exit;
        }
        require_once  "./profile.php";
    });
    
    $router->map('POST', '/profile', function(){
        if (!isset($_SESSION['user']['id'])) {
            // Redirection vers la connexion si l'utilisateur n'est pas connecté
            header("Location: /my-little-mvc/login");
            exit;
        }
        $user = new AuthenticationController();
        $user->updateProfile($_SESSION['user']['id'], $_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['role']);
        //  rediriger après la mise à jour
        header("Location: /my-little-mvc/profile?update=success");
        exit;
    });



    // $router->map('GET', '/profile', function(){
    //     require_once "./profile.php";
    // });
    
    // $router->map('POST', '/profile', function(){
    //     $user= new AuthenticationController();
    //     $user->updateProfile($_SESSION['user']['id'], $_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['role']);
    // });
    
    $match = $router->match(); 
    if($match && is_callable($match['target'])) { 
        call_user_func_array($match['target'], $match['params']); 
    } else { 
        // Aucune route trouvée 
        // header("HTTP/1.0 404 Not Found"); 
        // nécessite __DIR__ . '/404.php'; 
        echo "erreur" ; 
    };
