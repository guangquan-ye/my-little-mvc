<?php
namespace App\Controller;
require_once 'vendor/autoload.php';
use App\Model\Product;


class ShopController{

    public function index($page){


        $products = new Product();
        $products = $products->findPaginated($page);

    }

}

?>