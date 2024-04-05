<?php

namespace Model;

use Model\VO\CidadesVO;
use Util\Database;

final class CidadesModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("SELECT * FROM cidades");

        $array = [];

        foreach($data as $row) {
            $array[] = new CidadesVO($row['id'], $row['nome'], $row['uf'], $row['cep']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "SELECT * FROM cidades WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }

        return new CidadesVO($data[0]['id'], $data[0]['nome'], $data[0]['uf'], $data[0]['cep']);
    
    }   

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO cidades (nome, uf, cep) VALUES (:nome, :uf, :cep)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":uf" => $vo->getUf(),
            ":cep" => $vo->getCep()
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
        $query = "UPDATE cidades SET nome = :nome, uf = :uf, cep = :cep WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":uf" => $vo->getUf(),
            ":cep" => $vo->getCep(),
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM estudantes WHERE cidades_id = :id;
        DELETE FROM empresas WHERE cidades_id = :id;
        DELETE FROM cidades WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

}
