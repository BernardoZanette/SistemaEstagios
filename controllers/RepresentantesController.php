<?php

namespace Controller;

use Model\VO\RepresentantesVO;
use Model\RepresentantesModel;

final class RepresentantesController extends Controller {
    
    public function list() {
        $model = new RepresentantesModel();
        $data = $model->selectAll();

        $this->loadView("listaRepresentantes", [
            "representantes" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new RepresentantesVO();
        } else {
            $model = new RepresentantesModel();
            $vo = $model->selectOne(new RepresentantesVO($id));
        }


        $this->loadView("formRepresentantes", [
            "representantes" => $vo
        ]);
    }

    public function save() {    
        $id = $_POST['id'];
        $vo = new RepresentantesVO($_POST['id'], $_POST['cpf'], $_POST['rg'], $_POST['funcao'], $_POST['nome']);

        $model = new RepresentantesModel();

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("representantes.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new RepresentantesModel();
        $return = $model->delete(new RepresentantesVO($_GET['id']));

        $this->redirect("representantes.php");

    }

}