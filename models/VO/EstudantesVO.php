<?php

namespace Model\VO;

final class EstudantesVO extends VO
{
 
    private $matricula;
    private $nome;
    private $email;
    private $cpf;
    private $rg;
    private $endereco;
    private $telefone;
    private $cidades_id;
    private $cidades_nome;
    private $cursos_id;
    private $cursos_nome;
    private $num_turma;

    public function __construct($matricula = "", $nome = "", $email = "", $cpf = "", $rg = "", 
     $endereco = "", $telefone = "", $cidades_id = 0, $cidades_nome = "", $cursos_id = 0, $cursos_nome = "", $num_turma = "")
    {
        parent::__construct($matricula);

        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->cidades_id = $cidades_id;
        $this->cidades_nome = $cidades_nome;
        $this->cursos_id = $cursos_id;
        $this->cursos_nome = $cursos_nome;
        $this->num_turma = $num_turma;
        
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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

    public function getCidadesId()
    {
        return $this->cidades_id;
    }

    public function setCidadesId($cidades_id)
    {
        $this->cidades_id = $cidades_id;
    }

    public function getCidadesNome()
    {
        return $this->cidades_nome;
    }

    public function setCidadesNome($cidades_nome)
    {
        $this->cidades_nome = $cidades_nome;
    }

    public function getCursosId()
    {
        return $this->cursos_id;
    }

    public function setCursosId($cursos_id)
    {
        $this->cursos_id = $cursos_id;
    }

    public function getCursosNome()
    {
        return $this->cursos_nome;
    }

    public function setCursosNome($cursos_nome)
    {
        $this->cursos_nome = $cursos_nome;
    }

    public function getNumTurma()
    {
        return $this->num_turma;
    }

    public function setNumTurma($num_turma)
    {
        $this->num_turma = $num_turma;
    }
}