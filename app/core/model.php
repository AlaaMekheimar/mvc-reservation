<?php
namespace MVC\core;

use PDO;

class model{
    protected function connection(){
        define("SERVER","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DATABASE","master");
 

        define('DNS','mysql:host='.SERVER.';dbname='.DATABASE);
   
        return new PDO(DNS,USERNAME,PASSWORD);
    }
}