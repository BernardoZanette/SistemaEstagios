<?php

namespace Controller;

use Model\UsuariosModel;
use Model\VO\UsuariosVO;

final class LoginController extends Controller {

    public function __construct() {
        parent::__construct(false);
    }

    public function login() {
        $this->loadView("login");
    }

    public function fazerLogin() {
        $vo = new UsuariosVO(0, "", $_POST['login'], $_POST['senha']);
        $model = new UsuariosModel();

        $sucess = $model->doLogin($vo);

        if($sucess) {
            $this->redirect("estagios.php");
        }
        else {
            $this->redirect("login.php");
        }
        $this->redirect("estagios.php");
    }

    public function logout() {
        $model = new UsuariosModel();
        $model->logout();
        $this->redirect("login.php");
    }

}