<?php
require_once 'vendor/autoload.php';
use App\Controller\AuthenticationController;

if(isset($_POST['register'])){

    $controller = new AuthenticationController();

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = [$_POST['role']];


   $controller->registerController($fullname, $email, $password, $role);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
</head>
<body>
    <form  method="post">
        <input type="text" name="fullname" placeholder="Fullname">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <select name="role">
            <option value="ROLE_USER">ROLE_USER</option>
        </select>
        <input type="submit"  name='register' value="register">
    </form>
</body>
</html>
