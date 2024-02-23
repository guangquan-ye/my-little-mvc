<?php
require_once 'vendor/autoload.php';
use App\Controller\AuthenticationController;

if(isset($_POST['login'])){

    $controller = new AuthenticationController();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $controller->loginController($email, $password);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
<?php
require_once "header.php";
    ?>
<form method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" value="login">
</form>

</body>
</html>