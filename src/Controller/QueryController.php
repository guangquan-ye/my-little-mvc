<?php
namespace App\Controller;
require_once 'vendor/autoload.php';
use App\DataBase\QueryBuilder;

class QueryController
{

    public function index(){

        $query = new QueryBuilder();
        // $query->select('id', 1)->where('name', 'John Doe')->get('users');

        $query->where('name', 'John Doe', );
        $query->select('id', 1);
        $query->from('users');
        echo $query->getSql();
    }
}