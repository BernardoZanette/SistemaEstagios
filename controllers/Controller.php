<?php

namespace Controller;

use Model\UsuariosModel;

abstract class Controller {

    public function __construct($obrigaLogin = true){
        session_start();
    
        if ($obrigaLogin) {
            $model = new UsuariosModel();
            if (!$model->checkLogin()) {
                $this->redirect('login.php');
            }
        }
    }
    
    

    public function redirect ($url){
        header("location: $url");
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/$view.php");
    } 
    
}