<?php

namespace Model\VO;

final class EmpresasVO extends VO
{
    private $nome;
    private $endereco;
    private $telefone;
    private $email;
    private $cnpj;
    private $representantes_id;
    private $representantes_nome;
    private $cidades_id;
    private $cidades_nome;

    public function __construct($id = 0, $nome = "", $endereco = "", $telefone = "", $email = "", 
    $cnpj = "", $representantes_id = 0, $representantes_nome = "", $cidades_id = 0, $cidades_nome = "")
    {
        parent::__construct($id);

        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cnpj = $cnpj;
        $this->representantes_id = $representantes_id;
        $this->representantes_nome = $representantes_nome;
        $this->cidades_id = $cidades_id;
        $this->cidades_nome = $cidades_nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
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

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getCidadesId()
    {
        return $this->cidades_id;
    }

    public function setCidadesId($cidades_id)
    {
        $this->cidades_id = $cidades_id;
    }

    public function getCidadeNome() {
        return $this->cidades_nome;
    }

    public function setCidadeNome($cidades_nome) {
        $this->cidades_nome = $cidades_nome;
    }

    public function getRepresentantesId()
    {
        return $this->representantes_id;
    }

    public function setRepresentantesId($representantes_id)
    {
        $this->representantes_id = $representantes_id;
    }

    public function getRepresentanteNome() {
        return $this->representantes_nome;
    }

    public function setRepresentanteNome($representantes_nome) {
        $this->representantes_nome = $representantes_nome;
    }

}