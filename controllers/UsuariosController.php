<?php

namespace Controller;

use Model\UsuariosModel;
use Model\VO\UsuariosVO;

final class UsuariosController extends Controller {
    
    public function list() {
        $model = new UsuariosModel();
        $data = $model->selectAll();

        $this->loadView("listaUsuarios", [
            "usuarios" => $data
        ]);
    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new UsuariosVO();
        } else {
            $model = new UsuariosModel();
            $vo = $model->selectOne(new UsuariosVO($id));
        }

        $this->loadView("formUsuarios", [
            "usuarios" => $vo
        ]);
    }

    public function save() {
        
        $id = $_POST['id'];
        $vo = new UsuariosVO($_POST['id'], $_POST['nome'], $_POST['login'], $_POST['senha']);
        $model = new UsuariosModel();
        
        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("usuarios.php");        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necesário pasar o ID");
        }

        $model = new UsuariosModel();
        $return = $model->delete(new UsuariosVO($_GET['id']));

        $this->redirect("usuarios.php");
    }

}