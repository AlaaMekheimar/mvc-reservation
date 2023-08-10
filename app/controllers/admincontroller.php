<?php

namespace MVC\controllers;
use MVC\core\controller;
use MVC\core\session;
use MVC\core\helpers;
use MVC\models\adminmodel;
use Rakit\Validation\Validator;


class admincontroller extends controller{
    private $objUserModel;
    public function __construct()
    {
        $this->objUserModel= new adminmodel;
        session::start();
    }
    public function login(){
        $this->view("back/login",['title'=>"login"]);
    }
    
  
    public function postlogin(){
         if(isset($_POST['email'])){
            $validator = new Validator;
            $validation = $validator->make($_POST , [
                'email'                 => 'required|email',
                'password'              => 'required',
               
            ]);
            $validation->validate();
            $validation->fails();
            $errors = $validation->errors()->firstOfAll();
            if(empty($errors)){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $data = $this->objUserModel->login($email,$password);
                if($data){
                    session::set('user',$data);
                    helpers::redirect('adminpost/index');
                }else{
                    header("location:login");
                }
                
            }else{
                header("location:login");
            }

         }else{
            header("location:login");
         }
    }

    public function register(){
        $this->view("back/register",['title'=>"register"]);
    }
    
    public function postregister(){
        if(isset($_POST['email'])){
           $validator = new Validator;
           $validation = $validator->make($_POST , [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
           ]);
           $validation->validate();
           $validation->fails();
           $errors = $validation->errors()->firstOfAll();
           if(empty($errors)){
            $name = $_POST['name'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $data = $this->objUserModel->register($name,$email,$password);
               if($data){
                header("location:login");
               }else{
                   header("location:register");
               }
               
           }else{
              
            header("location:register");
           }

        }else{
          
            header("location:register");
        }
   }

}