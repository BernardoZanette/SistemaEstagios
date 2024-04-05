<?php

namespace Model\VO;

final class EstagiosVO extends VO
{
    private $carga_horaria;
    private $empresas_id;
    private $empresas_nome;
    private $estudantes_matricula;
    private $estudantes_nome;
    private $orientadores_id;
    private $orientadores_nome;
    private $areas_id;
    private $areas_nome;
    private $supervisores_id;
    private $supervisores_nome;
    private $data_inicio;
    private $previsao_fim;
    private $data_fim;
    private $coorientadores_id;
    private $coorientadores_nome;
    private $tipo_processos;
    private $encaminhamentos;
    private $representantes_id;
    private $representantes_nome;

    public function __construct($id = 0, $carga_horaria = "", $empresas_id = 0, $empresas_nome = "",
    $estudantes_matricula = 0, $estudantes_nome = "", $orientadores_id = 0, $orientadores_nome = "", $areas_id = 0,
    $areas_nome = "", $supervisores_id = 0, $supervisores_nome = "", $data_inicio = "",
    $previsao_fim = "", $data_fim = "", $coorientadores_id = 0, $coorientadores_nome = "", 
    $tipo_processos = "", $encaminhamentos = "", $representantes_id = 0, $representantes_nome = "")
    {
        parent::__construct($id);

        $this->carga_horaria = $carga_horaria;
        $this->empresas_id = $empresas_id;
        $this->estudantes_matricula = $estudantes_matricula;
        $this->estudantes_nome = $estudantes_nome;
        $this->orientadores_id = $orientadores_id;
        $this->areas_id = $areas_id;
        $this->supervisores_id = $supervisores_id;
        $this->data_inicio = $data_inicio;
        $this->previsao_fim = $previsao_fim;
        $this->data_fim = $data_fim;
        $this->coorientadores_id = $coorientadores_id;
        $this->empresas_nome = $empresas_nome;
        $this->orientadores_nome = $orientadores_nome;
        $this->areas_nome = $areas_nome;
        $this->supervisores_nome = $supervisores_nome;
        $this->coorientadores_nome = $coorientadores_nome;
        $this->tipo_processos = $tipo_processos;
        $this->encaminhamentos = $encaminhamentos;
        $this->representantes_id = $representantes_id;
        $this->representantes_nome = $representantes_nome; 
    }

    public function getCargaHoraria()
    {
        return $this->carga_horaria;
    }

    public function setCargaHoraria($carga_horaria)
    {
        $this->carga_horaria = $carga_horaria;
    }

    public function getEmpresasId()
    {
        return $this->empresas_id;
    }

    public function setEmpresasId($empresas_id)
    {
        $this->empresas_id = $empresas_id;
    }

    public function getEmpresasNome()
    {
        return $this->empresas_nome;
    }

    public function setEmpresasNome($empresas_nome)
    {
        $this->empresas_nome = $empresas_nome;
    }

    public function getEstudantesMatricula()
    {   
        return $this->estudantes_matricula;
    }

    public function setEstudantesMatricula($estudantes_matricula)
    {
        $this->estudantes_matricula = $estudantes_matricula;
    }

    public function getEstudantesNome()
    {   
        return $this->estudantes_nome;
    }

    public function setEstudantesNome($estudantes_nome)
    {
        $this->estudantes_nome = $estudantes_nome;
    }

    public function getOrientadoresId()
    {
        return $this->orientadores_id;
    }

    public function setOrientadoresId($orientadores_id)
    {
        $this->orientadores_id = $orientadores_id;
    }

    public function getOrientadoresNome()
    {
        return $this->orientadores_nome;
    }

    public function setOrientadoresNome($orientadores_nome)
    {
        $this->orientadores_nome = $orientadores_nome;
    }

    public function getAreasId()
    {
        return $this->areas_id;
    }

    public function setAreasId($areas_id)
    {
        $this->areas_id = $areas_id;
    }

    public function getAreasNome()
    {
        return $this->areas_nome;
    }

    public function setAreasNome($areas_nome)
    {
        $this->areas_nome = $areas_nome;
    }

    public function getSupervisoresId()
    {
        return $this->supervisores_id;
    }

    public function setSupervisoresId($supervisores_id)
    {
        $this->supervisores_id = $supervisores_id;
    }

    public function getSupervisoresNome()
    {
        return $this->supervisores_nome;
    }

    public function setSupervisoresNome($supervisores_nome)
    {
        $this->supervisores_nome = $supervisores_nome;
    }

    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    public function setDataInicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;
    }

    public function getPrevisaoFim()
    {
        return $this->previsao_fim;
    }

    public function setPrevisaoFim($previsao_fim)
    {
        $this->previsao_fim = $previsao_fim;
    }
    public function getDataFim()
    {
        return $this->data_fim;
    }

    public function setDataFim($data_fim)
    {
        $this->data_fim = $data_fim;
    }

    public function getCoorientadoresId()
    {
        return $this->coorientadores_id;
    }

    public function setCoorientadoresId($coorientadores_id)
    {
        $this->coorientadores_id = $coorientadores_id;
    }

    public function getCoorientadoresNome()
    {
        return $this->coorientadores_nome;
    }

    public function setCoorientadoresNome($coorientadores_nome)
    {
        $this->coorientadores_nome = $coorientadores_nome;
    }

    public function getTipoProcesso()
    {
        return $this->tipo_processos;
    }

    public function setTipoProcesso($tipo_processos)
    {
        $this->tipo_processos = $tipo_processos;
    }

    public function getEncaminhamentos()
    {
        return $this->encaminhamentos;
    }

    public function setEncaminhamentos($encaminhamentos)
    {
        $this->encaminhamentos = $encaminhamentos;
    }

    public function getRepresentantesId()
    {
        return $this->representantes_id;
    }

    public function setRepresentantesId($representantes_id)
    {
        $this->representantes_id = $representantes_id;
    }

    public function getRepresentantesNome()
    {
        return $this->representantes_nome;
    }

    public function setRepresentantesNome($representantes_nome)
    {
        $this->representantes_nome = $representantes_nome;
    }

}