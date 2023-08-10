<?php

namespace MVC\controllers;
use Rakit\Validation\Validator;
use MVC\core\helpers;
use MVC\models\homemodel;
use MVC\models\adminpostmodel;
use MVC\core\controller;
use MVC\core\session;

class adminpostcontroller extends controller{
    private $objUserModel;
    private $data;
    private $male;
    public function __construct(){
    $this->objUserModel= new adminpostmodel;
     session::start();
     $this->data= session::get('user');
     if(empty($this->data)){
      echo "class not acess";
      die;
     }
     $this->male = new homemodel;
    }//end constructor

    function index(){
      $this->view("back/dashboard",['title'=>"dashboard"]);
   }//end index

     function add(){
        $this->view("back/add",['title'=>"add male"]);
     }//end add

     function postadd(){
        if(isset($_POST['price'])){
  
           $validator = new Validator;
           $validation = $validator->make($_POST + $_FILES, [
               'title'                  => 'required',
               'description'                 => 'required',
               'price'              => 'required',
               'image'      => 'required',
           ]);
           $validation->validate();
           $validation->fails();
           $errors = $validation->errors()->firstOfAll();
           if(empty($errors)){
              $title = $_POST['title'];
                 $description = $_POST['description'];
                 $price = $_POST['price'];
                 $admin_id= $this->data['admin_id'];
                 $image=$_FILES['image'];
                 $temp=$image['tmp_name'];
                 $name=$image['name'];
                 move_uploaded_file($temp,'img/'.$name);
                 $data = $this->objUserModel->insertMale($title,$description,$price,$name,$admin_id);
                 if($data) {
                  header("location:add");
                 }else{
                    echo "fail";
                 }
  
        }else{
           print_r($errors);
        }
     }
   }//end postadd
    
   function control(){
      $data = $this->male->getMale();
     $this->view("back/control",['title'=>"control",'data'=>$data]);
   }//end control

    function delete($id){
       
       $data= $this->objUserModel->deletemale($id);
        if($data){
            helpers::redirect('adminpost/control');
        }
    }//end delete

    function update($id){
    
        $data= $this->objUserModel->getmale($id);
      $this->view("back/update",['title'=>'update','data'=>$data]);
     }//end update

    function postupdate($id){
   
         if(isset($_POST['price'])){
  
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'title'                  => 'required',
                'description'                 => 'required',
                'price'              => 'required',
            ]);
            $validation->validate();
            $validation->fails();
            $errors = $validation->errors()->firstOfAll();
            if(empty($errors)){
               $title = $_POST['title'];
                  $description = $_POST['description'];
                  $price = $_POST['price'];               
                  $image=$_FILES['image'];
                  $temp=$image['tmp_name'];
                  $name=$image['name'];
               
                  if(!empty($name)){
                     move_uploaded_file($temp,'img/'.$name);
                  }
                  $data = $this->objUserModel->updatemale($title,$description,$price,$name,$id);
                  if($data) {
                     helpers::redirect('adminpost/control');
                  }else{
                     helpers::redirect('adminpost/control');
                  }
   
         }else{
            helpers::redirect('adminpost/control');
         }
    }
}//end postupdate 

public function logout(){
    Session::stop();
    helpers::redirect('admin/login'); 
}//end logout

function getreservation(){
   $data = $this->objUserModel->getreservation();
   $this->view("back/reservation",['title'=>"reservation",'data'=>$data]);
}//end getreservation
}