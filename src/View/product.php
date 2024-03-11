<?php
require_once 'vendor/autoload.php';
session_start();
use App\Controller\ShopController;


// $productId = $_GET['productId'];
// $productType = $_GET['productType'];

// $product = new ShopController();
// $productInfo = $product->showProduct($productId, $productType);


if(isset($_POST["productQuantity"])){

    
    $productId = $_GET['productId'];
    $userId = $_SESSION["user"]["id"];
    $quantity = $_POST["productQuantity"];

    $product->addProductToCart($productId, $userId, $quantity, $productType);
} 



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
require_once "header.php";
    ?>
<form method="post">
    <label for="productQuantity">Nombre de produits:</label>
    <input type="number" id="productQuantity" name="productQuantity">
    <input type="submit" value="Valider">
</form>



</body>

</html>