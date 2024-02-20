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


    public function showProduct($productId, $productType){

        
            // if(isset($_SESSION["user"]) && $_SESSION["user"]['isLogged'] === true){

                if($productType == 1){
                    $productElec = new Electronic();
                    
                    $setInfo = $productElec ->findOneById($productId);
                    
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
                }
                elseif($productType == 2){
                    $productCloth = new Clothing();
                   $setInfo =  $productCloth ->findOneById($productId);
                    // var_dump($setInfo, "toto");

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
                }else{
                    return "Le produit n'existe pas";
                }
            }
    }
    
// }




?>