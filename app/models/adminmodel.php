<?php

namespace MVC\models;

use MVC\core\model;
use PDO;
use Exception;
class adminmodel extends model{

    function login($email,$password){
        $query= "SELECT * FROM `admin` WHERE `email`=? AND `password`=?";
        $query= parent::connection()->prepare($query);
        $query->execute([$email,$password]);
        $data=$query->fetch(PDO::FETCH_ASSOC);
        return($data);
    }
    function register($name,$email,$password){
        $query= "INSERT INTO `admin` (`name`, `email`, `password`) VALUES (?,?,?)";
        try{
            $query= parent::connection()->prepare($query);
            $query->execute([$name,$email,$password]);
            return true;
        }catch(Exception){
            return false;
        }
    
    }

}