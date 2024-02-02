<?php
namespace App\Model;
use App\Abstract\AbstractProduct;

class Product extends AbstractProduct{

    public function findPaginated($page){

        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $statement = $pdo->prepare('SELECT * FROM product LIMIT 2 OFFSET 0');
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result;

    }

}