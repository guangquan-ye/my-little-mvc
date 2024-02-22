<?php

namespace App\Controller;

require_once 'vendor/autoload.php';

use App\Model\Cart;
use App\Model\Product;
use App\Model\Electronic;
use App\Model\Clothing;


class ShopController
{




    public function index($page)
    {
        $products = new Product();
        $itemPerPage = 3;
        $totalPages = round(ceil($products->findPaginatedCount() / $itemPerPage));

        $productz = $products->findPaginated($page, $itemPerPage);
        $productsArray = []; // Créer un tableau pour stocker les produits

        foreach ($productz as $product) {
            $productObj = new Product(); // Créer un nouvel objet Product pour chaque produit paginé
            $productObj
                ->setId($product['id'])
                ->setName($product['name'])
                ->setPhotos([$product["photos"]])
                ->setPrice($product['price'])
                ->setDescription($product['description'])
                ->setQuantity($product['quantity'])
                ->setCategoryId($product["category_id"]);

            $productsArray[] = $productObj; // Ajouter l'objet Product au tableau
        }

        $result = [
            'products' => $productsArray,
            'totalPages' => $totalPages
        ];
        return $result;
    }



    // Nico  +1 2
    // Jeremy 3
    // Guangquan 4 
    // Anais Labit 5
    // Corentin 6
    // Anais pas Labit 7
    // Herve  8 
    // Armin 9 
    // Julie 10
    // Thomas 11
    // Mehdi 12 
    // Joris 13 
    // Felix 14


    public function showProduct($productId, $productType)
    {
        // if(isset($_SESSION["user"]) && $_SESSION["user"]['isLogged'] === true){

        if ($productType == 1) {
            $productElec = new Electronic();

            $setInfo = $productElec->findOneById($productId);

            $product = new Product();
            $productInfo = $product
                ->setId($productElec->getId())
                ->setName($productElec->getName())
                ->setPhotos([$productElec->getPhotos()])
                ->setPrice($productElec->getPrice())
                ->setDescription($productElec->getDescription())
                ->setQuantity($productElec->getQuantity())
                ->setCategoryId($productElec->getCategoryId());

            return $setInfo;
        } elseif ($productType == 2) {
            $productCloth = new Clothing();
            $setInfo =  $productCloth->findOneById($productId);
            $product = new Product();
            $productInfo = $product
                ->setId($setInfo->getId())
                ->setName($setInfo->getName())
                ->setPhotos([$setInfo->getPhotos()])
                ->setPrice($setInfo->getPrice())
                ->setDescription($setInfo->getDescription())
                ->setQuantity($setInfo->getQuantity())
                ->setCategoryId($setInfo->getCategoryId());

            return $productInfo;
        } else {
            return "Le produit n'existe pas";
        }
    }

    public function addProductToCart($productId, $userId, $quantity, $productType)
    {

        $cart = new Cart();
        $exist = $cart->existCart($userId);
        
        var_dump($exist);
        
        if ($exist != false) {
            
            $cart->setId($exist['id'])->setIdUser($userId)->setQuantity($quantity);

            if ($productType == 1) {


                $product = new Electronic($productId, $userId);
                $productInfos = $product->findOneById($productId);
                var_dump($product);
                var_dump($productInfos);

                $productInfoQty = $productInfos->getQuantity();
                if ($productInfoQty >= $quantity) {

                    if ($exist = $product->existProduct($productId, $userId)) {

                        $cart->addToCart($productId, $userId, $quantity);
                    }
                }
            }

            if ($productType == 2) {

                $product = new Clothing();
                $productInfos = $product->findOneById($productId);
                $productInfoQty = $productInfos->getQuantity();
                if ($productInfoQty >= $quantity) {

                    $product->addToCart($productId, $userId, $quantity);
                }
            }
        }else{

            $cart = new Cart();
            $cart->createCart($userId);
            $cartInfo = $cart->existCart($userId);
            $cart->createDetail($cartInfo["id"],$productId,$quantity );

            var_dump($cartInfo);
        }
    }
}
