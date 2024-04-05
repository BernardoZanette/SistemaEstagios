<?php

namespace Controller;

use Model\VO\ProfessoresVO;
use Model\ProfessoresModel;
use Model\AreasModel;


final class ProfessoresController extends Controller {
    
    public function list() {
        $model = new ProfessoresModel();
        $data = $model->selectAll();

        $this->loadView("listaProfessores", [
            "professores" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new ProfessoresVO();
        } else {
            $model = new ProfessoresModel();
            $vo = $model->selectOne(new ProfessoresVO($id));
        }

        $modelAreas = new AreasModel();
        $areas = $modelAreas->selectAll();

        $this->loadView("formProfessores", [
            "professores" => $vo,
            "areas"=> $areas
        ]);
    }

    public function save() {    

        $id = $_POST['id'];
        $vo = new ProfessoresVO($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['areas_id'], "");

        $model = new ProfessoresModel();

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("professores.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new ProfessoresModel();
        $return = $model->delete(new ProfessoresVO($_GET['id']));

        $this->redirect("professores.php");

    }

}