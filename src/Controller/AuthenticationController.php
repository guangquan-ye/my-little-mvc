<?php

namespace App\Controller;

session_start();
require_once 'vendor/autoload.php';

use App\Model\User;

class AuthenticationController
{

    protected ?string $fullname = null;
    protected ?string $email = null;
    protected ?string $password = null;
    protected ?array $role = null;

    public function __construct(
        ?string $fullname = null,
        ?string $email = null,
        ?string $password = null,
        ?array $role = null
    ) {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): AuthenticationController
    {
        $this->fullname = $fullname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): AuthenticationController
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): AuthenticationController
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(?array $role): AuthenticationController
    {
        $this->role = $role;
        return $this;
    }




    public function registerController($fullname, $email, $password, $role)
    {

        $fullname = htmlspecialchars($fullname);
        $email = htmlspecialchars($email);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $user = new User();
        $user->setFullname($fullname);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setRole($role);

        $userInfo = $user->select();

        if ($userInfo) {
            echo "User already exist";
            exit();
        } else {
            $user->create();
            echo "User created";
        }
    }

    public function loginController($email, $password)
    {

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $userInfo = $user->select();

        if ($user->select()) {

            if (password_verify($password, $userInfo["password"])) {
                echo "Login success";

                $_SESSION["user"] = [
                    'isLogged' => true,
                    'id' => $userInfo['id'],
                    'fullname' => $userInfo['fullname'],
                    'email' => $userInfo['email'],
                    'role' => $userInfo['role']
                ];

                header('Location: shop.php?page=1');

                var_dump($_SESSION["user"]);
            } else {
                echo "Login failed";
            }
        } else {
            echo "Login failed";
        }
    }


    public function profile(){
        if (isset($_SESSION["user"])) {
            if ($_SESSION["user"]["isLogged"] == true) {
                $user = new User();
                $boolean = $user->findOneByEmail($_SESSION["user"]["id"]);

                if($boolean){

                    $userInfo = $user->profilInfo($_SESSION["user"]["id"]);
                    return $userInfo;
                }

            } 
        
        }
        else{
            header('Location: shop.php?page=1');

        }

    }

    public function updateProfile($id, $fullname, $email, $password, $role){
        $id = htmlspecialchars($id);
        $fullname = htmlspecialchars($fullname);
        $email = htmlspecialchars($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $user = new User();
        $user->setId($id);
        $user->setFullname($fullname);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setRole($role);
        $user->update();
    }
}







//  else{
//     echo "Probleme avec la creation de l'utilisateur";
//     exit();
//  }
