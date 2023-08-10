<?php
namespace MVC\models;

use MVC\core\model;
use PDO;
use Exception;

class homemodel extends model{
    function getMale() {
        $query = "SELECT * FROM male";
        $query = parent::connection()->prepare($query);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
   function reservation($name,$phone,$number_person,$date,$time,$message){
    $query= "INSERT INTO `reservation` (`name`, `phone`, `number_person`,`date`,`time`,`message`) VALUES (?,?,?,?,?,?)";
  
        $query= parent::connection()->prepare($query);
        $query->execute([$name,$phone,$number_person,$date,$time,$message]);
     

   }
}
