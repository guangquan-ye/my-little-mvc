<?php
require_once 'vendor/autoload.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    
<form method="post" target="login">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" value="login">
</form>

</body>
</html>