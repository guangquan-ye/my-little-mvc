<?php
require_once 'vendor/autoload.php';
use App\Model\User;
use App\Controller\AuthenticationController;

$authController = new AuthenticationController;
$userInfo = $authController->profile();
var_dump($userInfo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>

<h1>User Information</h1>
    
    <ul>
        <li><strong>ID:</strong> <?= $userInfo["id"]?></li>
        <li><strong>Fullname:</strong><?= $userInfo["fullname"]?></li>
        <li><strong>Email:</strong> <?= $userInfo["email"]?></li>
        <li><strong>Role:</strong> <?= $userInfo["role"]?></li>
    </ul>

    <form action="process_form.php" method="post">
        <label for="id">ID:</label>
        <input type="text" name="id" value="<?= $userInfo["id"]?>" readonly>

        <label for="fullname">Fullname:</label>
        <input type="text" name="fullname" value="<?= $userInfo["fullname"]?>" readonly>

        <label for="email">Email:</label>
        <input type="email"  name="email" value="<?= $userInfo["email"]?>" readonly>

        <label for="password">Password:</label>
        <input type="password" name="password">

        <label for="password_conf">Password confirmation:</label>
        <input type="password" name="password_conf">

        <label for="role">Role:</label>
        <input type="text" name="role" value='<?= $userInfo["role"]?>' readonly>

        <button type="submit">Submit</button>
    </form>
</body>
</html>