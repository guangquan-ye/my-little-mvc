<?php

require_once 'vendor/autoload.php';


use App\Model\Category;
use App\Model\Clothing;
use App\Model\Electronic;


$clothings = new Clothing();


// $clothings->setId(1)
//     ->setName('T-shirt')
//     ->setPhotos(['t-shirt.jpg'])
//     ->setPrice(10)
//     ->setDescription('A nice T-shirt')
//     ->setQuantity(10)
//     ->setCategoryId(1)
//     ->setCreatedAt(new \DateTime())
//     ->setUpdatedAt(new \DateTime());

  
// $clothings->create();

$findall = $clothings->findAll();


    $clothings->setId(1)
    ->setName('T-shirt')
    ->setPhotos(['t-shirt.jpg'])
    ->setPrice(10)
    ->setDescription('A nice T-shirt')
    ->setQuantity(10)
    ->setCategoryId(1)
    ->setCreatedAt(new \DateTime())
    ->setUpdatedAt(new \DateTime());

    echo "<pre>";
    var_dump($clothings);
    echo "</pre>";
?>