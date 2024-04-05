<?php

namespace Model\VO;

final class RepresentantesVO extends VO
{
    private $cpf;
    private $rg;
    private $nome;
    private $funcao;

    public function __construct($id = 0, $cpf = "", $rg = "", $funcao = "", $nome = "")
    {
        parent::__construct($id);
        
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->funcao = $funcao;
        $this->nome = $nome;

    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    
    public function getFuncao()
    {
        return $this->funcao;
    }

    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

}