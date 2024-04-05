<?php

namespace Model;

use Model\VO\RepresentantesVO;
use Util\Database;

final class RepresentantesModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("SELECT * FROM representantes");

        $array = [];

        foreach($data as $row) {
            $array[] = new RepresentantesVO($row['id'], $row['cpf'], $row['rg'], $row['funcao'], $row['nome']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "SELECT * FROM representantes WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }
    
        return new RepresentantesVO($data[0]['id'], $data[0]['cpf'], $data[0]['rg'], $data[0]['funcao'], $data[0]['nome']);
    
    }

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO representantes (nome, cpf, rg, funcao) VALUES (:nome, :cpf, :rg, :funcao)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":funcao" => $vo->getFuncao(),
        ];

        $sucess = $db->execute($query, $binds);

        if ($sucess) {
            return $db->getLastInsertedId();
        } else {
            return null;
        }

    }

    public function update($vo) {

        $db = new Database();
        $query = "UPDATE representantes SET nome = :nome, cpf = :cpf, rg = :rg, funcao = :funcao WHERE id = :id";
        $binds = [
            ":id" => $vo->getId(),
            ":nome" => $vo->getNome(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":funcao" => $vo->getFuncao(),
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "DELETE FROM representantes WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

}
