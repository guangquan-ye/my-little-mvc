<?php
// --------------------------------------------------------------------------------------------------------
// -----------------------------------------Setting up the project-----------------------------------------
require_once 'vendor/autoload.php';
if(!isset($_SESSION)){ 
    session_start();
}
use App\Model\Clothing;
use App\Model\Electronic;
use App\Controller\ShopController;
// -----------------------------------------Setting up the project-----------------------------------------
// --------------------------------------------------------------------------------------------------------




// --------------------------------------------------------------------------------------------------------
// -----------------------------------------Controller call-----------------------------------------------

if(isset($_GET['page'])){
    
    var_dump($urlParam = $_GET["page"]);
    $shop = new ShopController();
    $paginated = $shop->index($urlParam);
    var_dump($paginated);
}
// -----------------------------------------Controller call------------------------------------------------
// --------------------------------------------------------------------------------------------------------




// --------------------------------------------------------------------------------------------------------
// --------------------------------Instantiation of the different classes--------------------------------

$electronic = new Electronic();
$electLoop = $electronic->findAll();

$clothe = new Clothing();
$clothLoop = $clothe->findAll();

// --------------------------------Instantiation of the different classes--------------------------------
// --------------------------------------------------------------------------------------------------------


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <a href="shop.php?page=1">Home</a>
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