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
        <li><strong>ID:</strong> 9</li>
        <li><strong>Fullname:</strong> pap</li>
        <li><strong>Email:</strong> a@b.c</li>
        <li><strong>Role:</strong> ["ROLE_USER"]</li>
    </ul>
</body>
</html>