<?php

namespace MVC\core;
class helpers{
    //path => controller/funname
   static function redirect($path){
      header("LOCATION:".DOMAIN_NAME.'/'.$path);
   }

}