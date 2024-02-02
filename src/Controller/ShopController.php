<?php
namespace App\Controller;
require_once 'vendor/autoload.php';
use App\Model\Product;


class ShopController{

    public function index($page){

        $offSet = ($page - 1) * 2;
        $products = new Product();
        $products = $products->findPaginated($page, $offSet);

    }

}

?>