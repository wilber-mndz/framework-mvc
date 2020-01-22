<?php

class Recibir extends MainController{

    public function index(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST);

            //atributo name del input, Nombre del campo, Caracteres Máximos, Caracteres Mínimos 
            $this->inputPost('nombre', 'Nombre', 20, 3, 'float');

            print_r($this->error);
        }
        
    }
}

?>