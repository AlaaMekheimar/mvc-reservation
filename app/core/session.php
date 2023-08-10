<?php
 
 namespace MVC\core;

 class session{
      static function start(){
        @session_start();
      }
      static function set($key,$value){
             $_SESSION[$key]= $value;
      }
      static function get($key){
          if(isset($_SESSION[$key]))
          return $_SESSION[$key];
      }
      static function stop(){
        session_destroy();
      }
 }