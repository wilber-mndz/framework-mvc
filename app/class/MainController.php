<?php

class MainController{

    public $error = [];

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

    public function helper($helper){
        if (file_exists('../app/helpers/' . $helper . '_helper.php')) {
            require_once('../app/helpers/' . $helper . '_helper.php');
        } else {
            die('La helper no existe');
        }
    }

    // function inputPost($value, $label = false, $max = false, $min = false, $type = false){

    //     // Obtenemos el valor
    //     $value = $_POST[$value];

    //     // Verificamos que el campo no este vacío
    //     if ($value == '' || $value == null) {

    //         if ($label) {
    //             array_push($this->error, "Por favor ingrese el campo $label");
    //         } else {
    //             array_push($this->error, 'Por favor complete todo el formulario');
    //         }

    //     }

    //     // Verificamos el numero máximo de caracteres
    //     if (!$this->error && $max != false && strlen($value) > $max ) {
    //         if($label){
    //             array_push($this->error, "El campo $label no debe tener mas de $max caracteres");
    //         } else {
    //             array_push($this->error, "Excedido el numero de caracteres por campo");
    //         }
    //     }

    //     // Verificamos el numero de caracteres mínimos
    //     if (!$this->error && $min != false && strlen($value) < $min) {
    //         if($label){
    //             array_push($this->error, "El campo $label debe al menos $min caracteres");
    //         } else {
    //             array_push($this->error, "Insuficiente numero de caracteres por campo");
    //         }
    //     }

    //     // Verificamos si el campo es de tipo entero
    //     if (!$this->error && $type != false && $type == 'int') {
    //         if (!filter_var($value, FILTER_VALIDATE_INT) ) {
    //             array_push($this->error, "El campo $label debe ser un numero entero");
    //         }else{
    //             // Almacenamos el numero como un entero
    //             // Ya que los parámetros enviados por POST son de tipo string
    //             $value = (int)$value;
    //         }
    //     }

    //     // Verificamos si el campo es de tipo entero
    //     if (!$this->error && $type != false && $type == 'float') {
    //         if (!filter_var($value, FILTER_VALIDATE_FLOAT) ) {
    //             array_push($this->error, "El campo $label debe ser un numero");
    //         }else{
    //             // Almacenamos el numero como un entero
    //             // Ya que los parámetros enviados por POST son de tipo string
    //             $value = (float)$value;
    //         }
    //     }


    // }
}

?>