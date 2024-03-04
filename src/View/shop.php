<?php
// --------------------------------------------------------------------------------------------------------
// -----------------------------------------Setting up the project-----------------------------------------
require_once 'vendor/autoload.php';
if (isset($_SESSION)) {
    session_start();
}



use App\Controller\ShopController;

$shop = new ShopController();
if(isset($_GET['page'])){
    $currentPage = $_GET['page'];
    $paginated = $shop->index($currentPage);

}else{
    $paginated = $shop->index(1);
    $currentPage = "1";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

</head>

<body>
<?php
require_once "header.php";
    ?>

<?php foreach ($paginated['products'] as $product): ?>
    <br>
    <div class='truc'>
        <div class='trucInfo'>item name: <?php echo $product->getName(); ?></div>
        <div class='trucInfo'>item price: <?php echo $product->getPrice(); ?></div>
        <div class='trucInfo'>item description: <?php echo $product->getDescription(); ?></div>
        <div class='trucInfo'>item quantity: <?php echo $product->getQuantity(); ?></div>
        <div class='trucInfo'>item id category: <?php echo $product->getCategoryId(); ?></div>
        <a href='/my-little-mvc/product.php?productId=<?php echo $product->getId(); ?>&productType=<?php echo $product->getCategoryId(); ?>'>Voir détails du produit</a>
    </div>
<?php endforeach; ?>

    <?php

    ?>

<!-- --------------------------------- Pagination  ------------------------ -->


    <br><div class="pagination">
    <?php if ($currentPage > 1): ?>
        <a href="/my-little-mvc/shop.php?<?php echo ($currentPage - 1); ?>">&laquo; Précédent</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $paginated['totalPages']; $i++): ?>
        <a href="/my-little-mvc/shop.php?page=<?php echo $i; ?>" <?php if ($i === $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
    <?php endfor; ?>

    <?php if ($currentPage < $paginated['totalPages']): ?>
        <a href="/my-little-mvc/shop.php?page=<?php echo ($currentPage + 1); ?>">Suivant &raquo;</a>
    <?php endif; ?>

    <!-- --------------------------------- Pagination  ------------------------ -->

    <!-- // --------------------------------- Item display by page  ------------------------



// foreach ($paginated['products'] as $product) {
//     echo "<br>" . "<div  class='truc'>";
//     echo "<div class='trucInfo'>" . "item name:" . $product->getName() . "</div>";
//     echo "<div class='trucInfo' >" . " item price:" . $product->getPrice() . "</div>";
//     echo "<div class='trucInfo' >" . "item description:" . $product->getDescription() . "</div>";
//     echo "<div class='trucInfo' >" . "item quantity:" . $productz->getQuantity() . "</div>";
//     echo "<div class='trucInfo' >" . "item id category:" . $product->getCategoryId() . "</div>";
//     echo "<a href='/my-little-mvc/product.php?productId=" . $product->getId() ."&productType=".$product->getCategoryId(). "'>Voir détails du produit</a>";
//     echo "</div>";
// }

// --------------------------------- Item display by page  ------------------------




    
// --------------------------------- Category Creation ------------------------
    // $categ = new Category();
    // $categ->setName("clothing");
    // $categ->setDescription("clothing stuff");
    // $categ->setCreatedAt(new \DateTime());
    // $categ->create();

    // --------------------------------- Category Creation ------------------------


    // $electronic = new Electronic();
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

    // $electLoop = $electronic->findAll();

    // foreach($electLoop as $elec){

    //     echo "<br>" . "<div  class='clothInfoContainer'>" ;
    //     echo "<div class='clothInfo'>". "Electronic item name:" . $elec->getName() . "</div>" ;
    //     echo "<div class='elecInfo' >" . "Electronic item price:" . $elec->getPrice() . "</div>";
    //     echo "<div class='elecInfo' >" . "Electronic item description:" . $elec->getDescription() . "</div>";
    //     echo "<div class='elecInfo' >" ."Electronic item quantity:" . $elec->getQuantity() . "</div>" ;
    //     echo "<div class='elecInfo' >" . "Electronic item id category:" . $elec->getCategoryId() . "</div>" ;
    //     echo $elec->getWarantyFee() ;
    //     $photos = $elec->getPhotos();
    //         foreach ($photos as $photo ) {
    //             echo "<div>" . $photo . "</div>";
    //         }
    //     echo "</div>";
    // }


    // --------------------------------- Clothing Creation ------------------------

    // $clothe = new Clothing();
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

// --------------------------------- clothing Creation ------------------------


// --------------------------------- Clothe display ------------------------


    // $clothLoop = $clothe->findAll();

    // foreach ($clothLoop as $cloth) {
    //     echo "<br>" . "<div  class='clothInfoContainer'>" ;
    //     echo "<div class='clothInfo'>". "Clothe name:" . $cloth->getName() . "</div>" ;
    //     echo "<div class='clothInfo' >" . "Clothe price:" . $cloth->getPrice() . "</div>";
    //     echo "<div class='clothInfo' >" . "Clothe description:" . $cloth->getDescription() . "</div>";
    //     echo "<div class='clothInfo' >" ."Clothe quantity:" . $cloth->getQuantity() . "</div>" ;
    //     echo "<div class='clothInfo' >" . "Clothe id category:" . $cloth->getCategoryId() . "</div>" ;
    //     echo $cloth->getMaterialFee() ;
    //     $photos = $cloth->getPhotos();
    //         foreach ($photos as $photo ) {
    //             echo "<div>" . $photo . "</div>";
    //         }
    //     echo "</div>";
    // }

    // --------------------------------- Clothe display ------------------------ -->

    

</div>

</body>

</html>