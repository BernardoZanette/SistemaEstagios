<?php

namespace Controller;

use Model\CidadesModel;
use Model\VO\CidadesVO;

final class CidadesController extends Controller {
    
    public function list() {
        $model = new CidadesModel();
        $data = $model->selectAll();

        $this->loadView("listaCidades", [
            "cidades" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new CidadesVO();
        } else {
            $model = new CidadesModel();
            $vo = $model->selectOne(new CidadesVO($id));
        }

        $this->loadView("formCidades", [
            "cidades" => $vo
        ]);
    }

    public function save() {
        
        $id = $_POST['id'];

        $vo = new CidadesVO($_POST['id'], $_POST['nome'], $_POST['uf'] , $_POST['cep']);
        $model = new CidadesModel();
        
        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("cidades.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new CidadesModel();
        $return = $model->delete(new CidadesVO($_GET['id']));

        $this->redirect("cidades.php");

    }

}
