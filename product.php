<?php
require_once 'vendor/autoload.php';

use App\Model\Category;
use App\Model\Clothing;
use App\Model\Electronic;



// $clothing4 = new Clothing();
// $clothing4->setName('Athleisure Tech Leggings');
// $clothing4->setPrice(45.99);
// $clothing4->setMaterialFee(8);
// $clothing4->setSize('S');
// $clothing4->setColor('pink');
// $clothing4->setType('Leggings');
// $clothing4->setDescription('Achieve comfort and style with our athleisure tech leggings');
// $clothing4->setQuantity(100);
// $clothing4->setCategoryId(1);
// $clothing4->setCreatedAt(new \DateTime());
// $clothing4->setPhotos(['https://example.com/tech-leggings1.jpg', 'https://example.com/tech-leggings2.jpg']);
// $clothing4->create();






if (isset($_GET["id_product"])) {
    
    $id_product = intval($_GET["id_product"]); 

    if (is_int($id_product) && isset($_GET["product_type"])) {
        var_dump($_GET["product_type"]);

        if ($_GET["product_type"] === "electronic") {
            $electronic = new Electronic();
            if ($findElec = $electronic->findOneById($id_product)) {

                echo "<br>" . "<div  class='elecInfoContainer'>" ;
                echo "<div class='elecInfo'>". "Electronic item name:" . $findElec->getName() . "</div>" ;
                echo "<div class='elecInfo' >" . "Electronic item price:" . $findElec->getPrice() . "</div>";
                echo "<div class='elecInfo' >" . "Electronic item description:" . $findElec->getDescription() . "</div>";
                echo "<div class='elecInfo' >" ."Electronic item quantity:" . $findElec->getQuantity() . "</div>" ;
                echo "<div class='elecInfo' >" . "Electronic item id category:" . $findElec->getCategoryId() . "</div>" ;
                $photos = $findElec->getPhotos();
                foreach($photos as $photo){
                    echo "<div class='elecInfo' >" . "Clothing item photo:" . $photo;
                }
            
            }
        }
        elseif ($_GET["product_type"] === "clothing") {
            $clothing = new Clothing();

            if ($findCloth = $clothing->findOneById($id_product)) {
                // var_dump($findCloth);

             

                    echo "<br>" . "<div  class='clothInfoContainer'>" ;
                    echo "<div class='clothInfo'>". "Clothing item name:" . $findCloth->getName() . "</div>" ;
                    echo "<div class='clothInfo' >" . "Clothing item price:" . $findCloth->getPrice() . "</div>";
                    echo "<div class='clothInfo' >" . "Clothing item description:" . $findCloth->getDescription() . "</div>";
                    echo "<div class='clothInfo' >" ."Clothing item quantity:" . $findCloth->getQuantity() . "</div>" ;
                    echo "<div class='clothInfo' >" . "Clothing item id category:" . $findCloth->getCategoryId() . "</div>" ;
                    $photos = $findCloth->getPhotos();
                    foreach($photos as $photo){
                        echo "<div class='clothInfo' >" . "Clothing item photo:" . $photo;
                    }

                
            } else {
                echo "Le produit de la category Clothing demandé n'existe pas";
            }
        }
    }
    else{
        echo "Probleme avec 'if (is_int($id_product))'" . $_GET["product_type"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>