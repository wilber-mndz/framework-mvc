<?php
class Index extends MainController{

    public function __construct(){
    }
    
    public function index(){
        $this->view('index/index');
    }
}

?>