<?php
define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS."app");
define("CORE",APP.DS."core");
define("MODELS",APP.DS."models");
define("VIEWS",APP.DS."views");
define("CONTROLLERS",APP.DS."controllers");
define("VENDOR",ROOT.DS."vendor");
define ("DOMAIN_NAME","http://localhost/mvc-grilli-master-pro/public");

define('CSS_PATH',DOMAIN_NAME.'/');


require_once (VENDOR.DS."autoload.php");


use MVC\core\app;
$obj = new app;
