<?php

namespace App\DataBase;
use PDO;
use Exception;

class QueryBuilder{

    protected string $pdo;
    private string $table;
    private string $fields = "*";
    private array $wheres=[];

    public function __construct(){

        $pdo = new PDO('mysql:host=localhost;dbname=draft-shop');
        $this->pdo = $pdo;
    }

    public function table(string $table){

        $this->table = $table;
        return $this;

    }

    public function select(string $fields){

        $this->fields = $fields;
        return $this;

    }

    public function where(string $column, string $operator, string $value){

        $this->wheres[] = ['type' => 'AND',
                          'column' =>$column,
                          'operator' => $operator, 
                          'value'=> $value];
        return $this;

    }

    public function orWhere(string $column,string $operator, string $value){

        $this->wheres[] = ['type' => 'OR',
                          'column' =>$column,
                          'operator' => $operator, 
                          'value'=> $value];
        return $this;

    }

    public function get(){

        $sql = 'SELECT' . $this->fields
                . 'FROM' . $this->table . 'WHERE' ;

                if(!empty($this->wheres)){


                }




    }







// }

// ---------------------------------------------------
// SELECT * FROM `clothing` WHERE 1


// class QueryBuilder{
//     protected $pdo;
//     private $from;

    
// public function from(string $table, string $alias):self{

//     $this->from = "$table $alias";

//     return $this;

// }

// public function toSql(): string{

//     return "SELECT * FROM {$this->from}";
// }


}