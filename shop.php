<?php
require_once 'vendor/autoload.php';
if(isset($_SESSION)){ 
    session_start();
}


session_start();
use App\Model\Category;
use App\Model\Clothing;
use App\Model\Electronic;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <?php
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]["isLogged"] == true){
            ?>
            <div> Hello <?= $_SESSION["user"]["fullname"] ?> you are connected!</div>
        <?php
        }
    }
    else{
        echo "You are not connected";
    }
    ?>
</head>
<body>
    

<?php

$categ = new Category();
// $categ->setName("clothing");
// $categ->setDescription("clothing stuff");
// $categ->setCreatedAt(new \DateTime());
// $categ->create();


$electronic = new Electronic();
// $electronic->setBrand('huawei');
// $electronic->setWarantyFee(20);
// $electronic->setName('huawei P50');
// $electronic->setPrice(1800);
// $electronic->setDescription('Nothing to expect');
// $electronic->setQuantity(220);
// $electronic->setCategoryId(2);
// $electronic->setCreatedAt(new \DateTime());
// $electronic->setPhotos(['photo1', 'photo2']);
// $electronic->create();

$electLoop = $electronic->findAll();

foreach($electLoop as $elec){

    echo "<br>" . "<div  class='clothInfoContainer'>" ;
    echo "<div class='clothInfo'>". "Electronic item name:" . $elec->getName() . "</div>" ;
    echo "<div class='elecInfo' >" . "Electronic item price:" . $elec->getPrice() . "</div>";
    echo "<div class='elecInfo' >" . "Electronic item description:" . $elec->getDescription() . "</div>";
    echo "<div class='elecInfo' >" ."Electronic item quantity:" . $elec->getQuantity() . "</div>" ;
    echo "<div class='elecInfo' >" . "Electronic item id category:" . $elec->getCategoryId() . "</div>" ;
    echo $elec->getWarantyFee() ;
    $photos = $elec->getPhotos();
        foreach ($photos as $photo ) {
            echo "<div>" . $photo . "</div>";
        }
    echo "</div>";
}

$clothe = new Clothing();
// $clothe->setSize('M');
// $clothe->setColor('blue');
// $clothe->setType("PullOver");
// $clothe->setName('PullOver');
// $clothe->setPrice(20);
// $clothe->setDescription('PullOver');
// $clothe->setQuantity(20);
// $clothe->setCategoryId(1);
// $clothe->setPhotos(['photo1', 'photo2']);
// $clothe->setMaterialFee(20);
// $clothe->setCreatedAt(new \DateTime());
// // $clothe->create();


$clothLoop = $clothe->findAll();

foreach ($clothLoop as $cloth) {
    echo "<br>" . "<div  class='clothInfoContainer'>" ;
    echo "<div class='clothInfo'>". "Clothe name:" . $cloth->getName() . "</div>" ;
    echo "<div class='clothInfo' >" . "Clothe price:" . $cloth->getPrice() . "</div>";
    echo "<div class='clothInfo' >" . "Clothe description:" . $cloth->getDescription() . "</div>";
    echo "<div class='clothInfo' >" ."Clothe quantity:" . $cloth->getQuantity() . "</div>" ;
    echo "<div class='clothInfo' >" . "Clothe id category:" . $cloth->getCategoryId() . "</div>" ;
    echo $cloth->getMaterialFee() ;
    $photos = $cloth->getPhotos();
        foreach ($photos as $photo ) {
            echo "<div>" . $photo . "</div>";
        }
    echo "</div>";
}

?>

</body>
</html>