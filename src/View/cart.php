<?php
require_once 'vendor/autoload.php';
use App\Model\Cart;
if (!isset($_SESSION)) {
    session_start();
}
// var_dump($_SESSION);
$idUser = $_SESSION['user']['id'];

$cart = new Cart();
$cart->setIdUser($_SESSION['user']['id']);
$cartInfos = $cart->cartStatus($idUser);
$detailInfos = $cart->findOneDetailById($cartInfos['id'], $idUser);

var_dump($detailInfos);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="cart-icon.png">
    <title>Cart</title>
</head>
<body>


<table>
    <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detailInfos as $product): ?>
        <tr>
            <td><?= $product['name']; ?></td>
            <td><?= $product['price']; ?> €</td>
            <td>
                <input type="number" max=<?=$product["stock"] ?> name="quantity"/> /<?=$product["stock"] ?>
            </td>
            <td><img src="<?= $product['photos']; ?>" alt="<?= $product['name']; ?>"></td>
            <td><button>Supprimer</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    
</body>
</html>