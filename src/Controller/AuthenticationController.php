<?php
namespace App\Controller;

require_once 'vendor/autoload.php';
use App\Model\User;

class AuthenticationController{

public function registerController($fullname, $email, $password, $role){
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = [$_POST['role']];
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $user = new User();
    $user->setFullname($fullname);
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setRole($role);
    
    $user->create();

}


}

 

 
//  else{
//     echo "Probleme avec la creation de l'utilisateur";
//     exit();
//  }


?>