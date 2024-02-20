<?php
namespace App\Controller;
require_once 'vendor/autoload.php';
use App\Model\Product;


class ShopController {




    public function index($page){
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


    public function showProduct($idProduct, $productType){

        
            if(isset($_SESSION["user"]) && $_SESSION["user"]['isLogged'] === true){

            }
    }
    
}




?>