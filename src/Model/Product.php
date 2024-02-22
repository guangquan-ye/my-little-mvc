<?php
namespace App\Model;
use App\Abstract\AbstractProduct;

class Product extends AbstractProduct{

    public function findPaginated($page, $itemPerPage){
        $offset = ($page - 1) * $itemPerPage;
    
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', 'root');
        $statement = $pdo->prepare('SELECT * FROM product LIMIT :offset, :itemPerPage');
        $statement->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $statement->bindParam(':itemPerPage', $itemPerPage, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
    
        return $result;
    }

    public function findPaginatedCount(){
        $pdo = new \PDO('mysql:host=localhost;dbname=draft-shop', 'root', 'root');
        $statement = $pdo->prepare('SELECT COUNT(*) AS total FROM product');
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);


        return $result["total"];
    }
    

}