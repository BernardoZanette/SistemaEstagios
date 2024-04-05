<?php

namespace Controller;

use Model\CursosModel;
use Model\VO\CursosVO;

final class CursosController extends Controller {
    
    public function list() {
        $model = new CursosModel();
        $data = $model->selectAll();

        $this->loadView("listaCursos", [
            "cursos" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new CursosVO();
        } else {
            $model = new CursosModel();
            $vo = $model->selectOne(new CursosVO($id));
        }

        $this->loadView("formCursos", [
            "cursos" => $vo
        ]);
    }

    public function save() {
        
        $id = $_POST['id'];

        $vo = new CursosVO($_POST['id'], $_POST['nome']);
        $model = new CursosModel();
        
        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("cursos.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new CursosModel();
        $return = $model->delete(new CursosVO($_GET['id']));

        $this->redirect("cursos.php");

    }

}
