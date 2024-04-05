<?php

namespace Model\VO;

final class SupervisoresVO extends VO {
    private $nome;
    private $formacao;
    private $telefone;
    private $email;
    private $empresas_id;
    private $empresas_nome;

    public function __construct($id = 0, $nome = "", $formacao = "", $telefone = "", $email = "",
     $empresas_id = 0, $empresas_nome = "")
    {
        parent::__construct($id);

        $this->nome = $nome;
        $this->formacao = $formacao;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->empresas_id = $empresas_id;
        $this->empresas_nome = $empresas_nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getFormacao()
    {
        return $this->formacao;
    }

    public function setFormacao($formacao)
    {
        $this->formacao = $formacao;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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

}