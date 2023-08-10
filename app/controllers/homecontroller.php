<?php

namespace MVC\controllers;
use Rakit\Validation\Validator;
use MVC\core\controller;
use MVC\models\homemodel;

class homecontroller extends controller{
    function index(){
        $model = new homemodel();
        $data = $model->getMale();
       $this->view('front/index',['title'=>"home",'data'=>$data]);
     
 }

 public function postreservation(){
    if(isset($_POST['name'])){
       $validator = new Validator;
       $validation = $validator->make($_POST , [
        'name'                  => 'required',
        'phone'                 => 'required',
        'person'              => 'required',
        'date'                  => 'required',
        'time'                 => 'required',
        'message'              => 'required',
       ]);
       $validation->validate();
       $validation->fails();
       $errors = $validation->errors()->firstOfAll();
       if(empty($errors)){
        $name = $_POST['name'];
           $phone = $_POST['phone'];
           $person = $_POST['person'];
           $date = $_POST['date'];
           $time = $_POST['time'];
           $message = $_POST['message'];
           $data = new homemodel;
           $data->reservation($name,$phone,$person,$date,$time,$message);
           if($data){
            header("location:index");
           }else{
                  echo 'failed';
           }
           
       }else{
          
           print_r($errors);
       }

    }
           
    
    }
    }
