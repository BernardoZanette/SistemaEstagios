<?php

namespace Controller;

use Model\VO\EstudantesVO;
use Model\EstudantesModel;
use Model\CidadesModel;
use Model\CursosModel;


final class EstudantesController extends Controller {
    
    public function list() {
        $model = new EstudantesModel();
        $data = $model->selectAll();

        $this->loadView("listaEstudantes", [
            "estudantes" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new EstudantesVO();
        } else {
            $model = new EstudantesModel();
            $vo = $model->selectOne(new EstudantesVO($id));
        }

        $modelCidades = new CidadesModel();
        $cidades = $modelCidades->selectAll();

        $modelCursos = new CursosModel();
        $cursos = $modelCursos->selectAll();

        $this->loadView("formEstudantes", [
            "estudantes" => $vo,
            "cidades"=> $cidades,
            "cursos"=> $cursos
            
        ]);
    }

    public function save() {    
        $id = $_POST['id'];

        $vo = new EstudantesVO($_POST['matricula'], $_POST['nome'], $_POST['email'], $_POST['cpf'], 
        $_POST['rg'], $_POST['endereco'], $_POST['telefone'], $_POST['cidades_id'], "", $_POST['cursos_id'], "", $_POST['num_turma']);

        $model = new EstudantesModel();

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("estudantes.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new EstudantesModel();
        $return = $model->delete(new EstudantesVO($_GET['id']));

        $this->redirect("estudantes.php");

    }

}
