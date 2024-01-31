<?php

require_once 'vendor/autoload.php';


use App\Model\Category;
use App\Model\Clothing;
use App\Model\Electronic;


$clothe = new Clothing();
// $clothe->setSize('s');
// $clothe->setColor('red');
// $clothe->setType("Pull");
// $clothe->setName('Pull');
// $clothe->setPrice(200);
// $clothe->setDescription('Pull');
// $clothe->setQuantity(30);
// $clothe->setCategoryId(1);
// $clothe->setPhotos(['photo1', 'photo2']);
// $clothe->setMaterialFee(20);
// $clothe->setCreatedAt(new \DateTime());
// $clothe->setUpdatedAt(new \DateTime());
// $clothe->create();



$clothe->findAll();

foreach ($clothe->findAll() as $clothe) {
    echo $clothe->getName() . '<br>';
    echo $clothe->getPrice() . '<br>';
    echo $clothe->getDescription() . '<br>';
    echo $clothe->getQuantity() . '<br>';
    echo $clothe->getCategoryId() . '<br>';
    $photos = $clothe->getPhotos();

    foreach ($photos as $photo) {
        echo $photo . '<br>';  
}
    echo $clothe->getMaterialFee() . '<br>';
    
    echo $clothe->getCreatedAt()->format('Y-m-d H:i:s') . '<br>';
    echo $clothe->getUpdatedAt()->format('Y-m-d H:i:s') . '<br>';
    echo $clothe->getSize() . '<br>';
    echo $clothe->getColor() . '<br>';
    echo $clothe->getType() . '<br>';
    die();
}



?>