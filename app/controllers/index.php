<?php
class Index extends MainController{

    public function __construct(){
    }
    
    public function index(){
        $this->helper('validation');

        // Capturamos los errores
        $error = '';
        // $error.= usernameValidator('wilber');
        $error.= inputValidator('mÉndez', 'nombre', 3, 15);

        echo $error;

    }
}

?>