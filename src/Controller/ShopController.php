<?php
namespace App\Controller;
require_once 'vendor/autoload.php';
use App\Model\Product;
use App\Model\Electronic;
use App\Model\Clothing;


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



                if($productType === "electronic"){
                    $productElec = new Electronic();
                    
                    $productElec ->findOneById($idProduct);
                    
                    $product = new Product();
                    $product
                    ->setId($productElec["id"])
                    ->setName($productElec['name'])
                    ->setPhotos([$productElec["photos"]])
                    ->setPrice($productElec['price'])
                    ->setDescription($productElec['description'])
                    ->setQuantity($productElec['quantity'])
                    ->setCategoryId($productElec["category_id"]);

                    
                    return $product;
                }
                elseif($productType === "clothing"){
                    $productCloth = new Clothing();
                    $productCloth ->findOneById($idProduct);

                    $product = new Product();
                    $product
                    ->setId($productCloth["id"])
                    ->setName($productCloth['name'])
                    ->setPhotos([$productCloth["photos"]])
                    ->setPrice($productCloth['price'])
                    ->setDescription($productCloth['description'])
                    ->setQuantity($productCloth['quantity'])
                    ->setCategoryId($productCloth["category_id"]);
                    
                    return $product;
                }else{
                    return "Le produit n'existe pas";
                }




            }
    }
    
}




?>