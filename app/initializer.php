<?php
require_once('config/config.php');

spl_autoload_register(function($className){
    require_once('class/' . $className . '.php');
});

$start = new Core;

?>