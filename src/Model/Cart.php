<?php
namespace App\Model;


class Cart
{
    private ?int $id;
    private ?int $idUser;
    private ?int $idProduct;
    private ?int $quantity;
    private ?\DateTime $createdAt;
    private ?\DateTime $updatedAt;

    public function __construct(?int $id = null, ?int $idUser = null, ?int $idProduct = null, ?int $quantity = null, ?\DateTime $createdAt = null, ?\DateTime $updatedAt = null)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idProduct = $idProduct;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Cart
    {
        $this->id = $id;
        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): Cart
    {
        $this->idUser = $idUser;
        return $this;
    }

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(?int $idProduct): Cart
    {
        $this->idProduct = $idProduct;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): Cart
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): Cart
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): Cart
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function cartStatus($idUser){

        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', 'bouba');
        $statement = $pdo->prepare('SELECT * FROM cart WHERE id_user = :idUser');
        $statement->bindParam(':idUser', $idUser, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result;
}




public function createCart($idUser){

    $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', 'bouba');
    
    $statement = $pdo->prepare('INSERT INTO `cart`(`id_user`, `creation_date`) VALUES (:idUser, NOW())');

    $statement->bindParam(':idUser', $idUser, \PDO::PARAM_INT);
    
    $statement->execute();

}


    public function createDetail($cartId,$productId,$quantity){


        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', 'bouba');
        $statement = $pdo->prepare('INSERT INTO `detail`(`id_cart`, `id_product`, `quantity`) VALUES (:cartId, :productId, :quantity)');
        $statement->bindParam(':cartId', $cartId, \PDO::PARAM_INT);
        $statement->bindParam(':productId', $productId, \PDO::PARAM_INT);
        $statement->bindParam(':quantity', $quantity, \PDO::PARAM_INT);
        $statement->execute();



    }


    public function findOneDetailById(int $idCart, int $userId): array|false
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $sql = "SELECT detail.*, product.name, product.price, product.photos, product.description, product.quantity as stock
        FROM detail 
        INNER JOIN cart ON detail.id_cart = cart.id
        INNER JOIN product ON detail.id_product = product.id
        WHERE detail.id_cart = :idCart AND cart.id_user = :userId AND product.id = detail.id_product";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':idCart', $idCart);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $detail = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
        return $detail;
    }
    
}

// public function findAllProductDetail(int $userId): array
// {
//     $cart = $this->cartStatus($userId);

//     if (!$cart) {
//         return []; // Aucun panier trouvé pour cet utilisateur
//     }

//     $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
//     $sql = "SELECT detail.* 
//             FROM detail 
//             WHERE detail.id_cart = :cartId";
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':cartId', $cart['id'], \PDO::PARAM_INT);
//     $statement->execute();
//     $details = $statement->fetchAll(\PDO::FETCH_ASSOC);

//     $productsDetails = [];
//     foreach ($details as $detail) {
//         $productsDetails[] = new static(
//             $detail['id'],
//             $detail['id_cart'],
//             $detail['id_product'],
//             $detail['quantity'],
//             new \DateTime($detail['created_at']),
//             $detail['updated_at'] ? (new \DateTime($detail['updated_at'])) : null
//         );
//     }

//     return $productsDetails;
// }







