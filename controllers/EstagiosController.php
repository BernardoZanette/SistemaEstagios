<?php

namespace Controller;

use Model\VO\EstagiosVO;
use Model\EstagiosModel;
use Model\EmpresasModel;
use Model\EstudantesModel;
use Model\ProfessoresModel;
use Model\SupervisoresModel;
use Model\AreasModel;


final class EstagiosController extends Controller {
    
    public function list() {
        $model = new EstagiosModel();
        $data = $model->selectAll();

        $this->loadView("listaEstagios", [
            "estagios" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new EstagiosVO();
        } else {
            $model = new EstagiosModel();
            $vo = $model->selectOne(new EstagiosVO($id));
        }

        $modelEmpresas = new EmpresasModel();
        $empresas = $modelEmpresas->selectAll();

        $modelEstudantes = new EstudantesModel();
        $estudantes = $modelEstudantes->selectAll();

        $modelProfessores = new ProfessoresModel();
        $professores = $modelProfessores->selectAll();

        $modelAreas = new AreasModel();
        $areas = $modelAreas->selectAll();

        $modelSupervisores = new SupervisoresModel();
        $supervisores = $modelSupervisores->selectAll();

        $this->loadView("formEstagios", [
            "estagios" => $vo,
            "empresas"=> $empresas,
            "estudantes"=> $estudantes,
            "professores"=> $professores,
            "areas"=> $areas,
            "supervisores"=> $supervisores
        ]);
    }

    public function save() {    

        $id = $_POST['id'];

        $vo = new EstagiosVO($_POST['id'], $_POST['carga_horaria'], $_POST['empresas_id'], "",
        $_POST['estudantes_matricula'],  "", $_POST['orientadores_id'], "", $_POST['areas_id'],
        "",  $_POST['supervisores_id'], "", $_POST['data_inicio'], $_POST['previsao_fim'], "?", 
        $_POST['coorientadores_id'], "", $_POST['tipo_processos'], $_POST['encaminhamentos']);

        $model = new EstagiosModel();

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("estagios.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new EstagiosModel();
        $return = $model->delete(new EstagiosVO($_GET['id']));

        $this->redirect("estagios.php");

    }

}
