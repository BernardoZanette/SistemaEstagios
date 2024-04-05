<?php

namespace Model;

use Model\VO\ProfessoresVO;
use Util\Database;

final class ProfessoresModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("
            SELECT professores.id, professores.nome, professores.email, professores.areas_id, areas.nome as areas_nome
            FROM professores
            JOIN areas
            ON professores.areas_id = areas.id;
        ");

        $array = [];

        foreach($data as $row) {
            $array[] = new ProfessoresVO($row['id'], $row['nome'], $row['email'], $row['areas_id'], $row['areas_nome']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = " SELECT professores.id, professores.nome, professores.email, professores.areas_id,
        areas.nome as areas_nome
        FROM professores
        JOIN areas
        ON professores.areas_id = areas.id; WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }
    
        return new ProfessoresVO($data[0]['id'], $data[0]['nome'], $data[0]['email'], $data[0]['areas_id'], $data[0]['areas_nome']);
    
    }   

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO professores (nome, email, areas_id) VALUES (:nome, :email, :areas_id)";
        $binds = [
            ':nome' => $vo->getNome(),
            ':email' => $vo->getEmail(),
            ':areas_id' => $vo->getAreaId()
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
        $query = "UPDATE professores SET nome = :nome, email = :email, areas_id = :areas_id WHERE id = :id";
        $binds = [
            ':nome' => $vo->getNome(),
            ':email' => $vo->getEmail(),
            ':areas_id' => $vo->getAreaId(),
            ':id' => $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM estagios WHERE orientadores_id = :id || coorientadores_id = :id;
        DELETE FROM professores WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

}
