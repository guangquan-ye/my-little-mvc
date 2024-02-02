<?php
namespace App\Model;
use App\Abstract\AbstractProduct;

class Product extends AbstractProduct{

    public function findPaginated($page, $offSet)
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
        $statement = $pdo->prepare('SELECT * FROM product LIMIT :page OFFSET :offset');
        $statement->bindValue(':offset', $offSet, \PDO::PARAM_INT);
        $statement->bindValue(':page', $page, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
    
        return $result;
    }
    

}