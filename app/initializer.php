<?php
require_once('config/config.php');
// Cargamos las dependencias
require_once('vendor/autoload.php');
// require "vendor/autoload.php";

spl_autoload_register(function($className){
    require_once('class/' . $className . '.php');
});

$start = new Core;

?>