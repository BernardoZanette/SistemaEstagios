<?php

namespace Controller;

use Model\DocumentosModel;
use Model\VO\DocumentosVO;
use Model\EstagiosModel;

require_once('helpers/ArquivosHelper.php');

final class DocumentosController extends Controller {
    
    public function list() {
        $model = new DocumentosModel();
        $data = $model->selectAll();

        $this->loadView("listaDocumentos", [
            "documentos" => $data
        ]);

    }

    public function get() {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            $vo = new DocumentosVO();
        } else {
            $model = new DocumentosModel();
            $vo = $model->selectOne(new DocumentosVO($id));
        }

        $model_estagio = new EstagiosModel();
        $estagios = $model_estagio->selectAll();

        $this->loadView("formDocumentos", [
            "documentos" => $vo,
            "estagios"=> $estagios
        ]);
    }

    public function save() {
        
        $id = $_POST['id'];

        $vo = new DocumentosVO($_POST['id'], $_POST['estagios_id'] , gravarArquivo($_FILES['termo_de_compromisso']), 
        gravarArquivo($_FILES['plano_de_atividade']), gravarArquivo($_FILES['ficha_autoavaliacao']), gravarArquivo($_FILES['ficha_avaliacao_empresa']),
        gravarArquivo($_FILES['relatorio_final']), "", 0);
        $model = new DocumentosModel();
        
        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("documentos.php");
        
    }

    public function remove() {
        if (empty($_GET['id'])) {
            die("Necessário passar o ID");
        }

        $model = new DocumentosModel();
        $return = $model->delete(new DocumentosVO($_GET['id']));

        $this->redirect("documentos.php");

    }

}
