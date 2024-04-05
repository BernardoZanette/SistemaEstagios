<?php

namespace Controller;

use Model\AreasModel;
use Model\VO\AreasVO;

final class AreasController extends Controller {
    
    public function list() {
        $model = new AreasModel();
        $data = $model->selectAll();

        $this->loadView("listaAreas", [
            "areas" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new AreasVO();
        } else {
            $model = new AreasModel();
            $vo = $model->selectOne(new AreasVO($id));
        }

        $this->loadView("formAreas", [
            "areas" => $vo
        ]);
    }

    public function save() {    
        $id = $_POST['id'];

        $vo = new AreasVO($_POST['id'], $_POST['nome']);
        $model = new AreasModel();
        
        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("areas.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new AreasModel();
        $return = $model->delete(new AreasVO($_GET['id']));

        $this->redirect("areas.php");

    }

}
