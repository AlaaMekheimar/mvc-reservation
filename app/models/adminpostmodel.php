<?php

namespace MVC\models;

use MVC\core\model;
use Exception;
use PDO;

class adminpostmodel extends model{
    function getmale($id) {
        $query = "SELECT * FROM male WHERE id =?";
        $query = parent::connection()->prepare($query);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function insertMale($title,$description,$price,$image,$adminId){
        $query="INSERT INTO `male`(`title`,`description`,`price`,`img`,`admin_id`)VALUES(?,?,?,?,?)";
        try{
            $query= parent::connection()->prepare($query);
            $query->execute([$title,$description,$price,$image,$adminId]);
            return true;
        }catch(Exception){
            return false;
        }

    }
    function deletemale($id){
        $sql = "DELETE FROM male WHERE id=?";
        $stmt = parent::connection()->prepare($sql);
      $data= $stmt->execute([$id]);
          return $data;
  
    }
    function updatemale($title, $description, $price, $img, $id) {
        if (!empty($img)) {
            $sql = "UPDATE male SET title=?, description=?, price=?, img=? WHERE id=?";
            $stmt = parent::connection()->prepare($sql);
            $stmt->execute([$title, $description, $price, $img, $id]);
        } else {
            $sql = "UPDATE male SET title=?, description=?, price=? WHERE id=?";
            $stmt = parent::connection()->prepare($sql);
            $stmt->execute([$title, $description, $price, $id]);
        }
    }

    function getreservation() {
        $query = "SELECT * FROM reservation";
        $query = parent::connection()->prepare($query);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}