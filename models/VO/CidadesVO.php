<?php

namespace Model\VO;

final class CidadesVO extends VO
{

    private $nome;
    private $uf;
    private $cep;

    public function __construct($id = 0, $nome = "", $uf = "", $cep = "")
    {
        parent::__construct($id);
        $this->nome = $nome;
        $this->uf = $uf;
        $this->cep = $cep;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }


}