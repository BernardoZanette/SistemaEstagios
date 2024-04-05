<?php

namespace Controller;

use Model\EmpresasModel;
use Model\CidadesModel;
use Model\RepresentantesModel;
use Model\VO\EmpresasVO;

final class EmpresasController extends Controller {
    
    public function list() {
        $model = new EmpresasModel();
        $data = $model->selectAll();

        $this->loadView("listaEmpresas", [
            "empresas" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new EmpresasVO();
        } else {
            $model = new EmpresasModel();
            $vo = $model->selectOne(new EmpresasVO($id));
        }

        $modelCidades = new CidadesModel();
        $cidades = $modelCidades->selectAll();

        $modelRepresentantes = new RepresentantesModel();
        $representantes = $modelRepresentantes->selectAll();

        $this->loadView("formEmpresas", [
            "empresas" => $vo,
            "cidades" => $cidades,
            "representantes" => $representantes
        ]);
    }

    public function save() {
        
        $id = $_POST['id'];
        $vo = new EmpresasVO($_POST['id'], $_POST['nome'] , $_POST['endereco'] , 
        $_POST['telefone'] , $_POST['email'], $_POST['cnpj'], $_POST['representantes_id'], "", $_POST['cidades_id'], 0);

        
        $model = new EmpresasModel();
        
        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("empresas.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new EmpresasModel();
        $return = $model->delete(new EmpresasVO($_GET['id']));

        $this->redirect("empresas.php");

    }

}
