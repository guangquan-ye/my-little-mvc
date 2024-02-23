<?php
require_once 'vendor/autoload.php';
use App\Model\User;
use App\Controller\AuthenticationController;

$authController = new AuthenticationController;
$userInfo = $authController->profile();
//var_dump($userInfo);


if(isset($_POST['form_submit'])){
    $id = $_SESSION['user']['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = [$_POST['role']];

    $authController->updateProfile($id, $fullname, $email, $password, $role);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?php
require_once "header.php";
    ?>
<h1>User Information</h1>
    
    <ul>
        <li><strong>Fullname:</strong><?= $userInfo["fullname"]?></li>
        <li><strong>Email:</strong> <?= $userInfo["email"]?></li>
        <li><strong>Role:</strong> <?= $userInfo["role"]?></li>
    </ul>

    <form  method="post">
        
        <label for="fullname">Fullname:</label>
        <input type="text" name="fullname" value="<?= $userInfo["fullname"]?>" >

        <label for="email">Email:</label>
        <input type="email"  name="email" value="<?= $userInfo["email"]?>" >

        <label for="password">Password:</label>
        <input type="password" name="password">

        <label for="role">Role:</label>
        <input type="text" name="role" value='<?= $userInfo["role"]?>'>

        <button type="submit" name="form_submit">Submit</button>
    </form>

</body>
</html>