<?php
require_once 'vendor/autoload.php';

use App\Model\Category;
use App\Model\Clothing;
use App\Model\Electronic;
use App\Model\Product;
use App\Controller\ShopController;


$productId = $_GET['productId'];
$productType = $_GET['productType'];

$product = new ShopController();
$productInfo = $product->showProduct($productId, $productType);

var_dump($productInfo);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



</body>

</html>