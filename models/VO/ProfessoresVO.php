<?php

namespace Model\VO;

final class ProfessoresVO extends VO
{

    private $nome;
    private $email;
    private $area_id;
    private $area_nome;

    public function __construct($id = 0, $nome = "", $email = "", $area_id = 0, $area_nome = "")
    {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->area_id = $area_id;
        $this->area_nome = $area_nome;

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
        $this->$email = $email;
    }

    public function getAreaId()
    {
        return $this->area_id;
    }

    public function setAreaId($area_id)
    {
        $this->$area_id = $area_id;
    }

    public function getAreaNome()
    {
        return $this->area_nome;
    }

    public function setAreaNome($area_nome)
    {
        $this->$area_nome = $area_nome;
    }

}