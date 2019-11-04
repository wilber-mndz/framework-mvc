<?php

class MainController{

    public function model($model){
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once('../app/models/' . $model . '.php');
            return new $model;
        } else {
            die('El modelo no existe');
        }
    }

    public function view($view, $parameters = []){
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else {
            die('La vista no existe');
        }
    }
}

?>