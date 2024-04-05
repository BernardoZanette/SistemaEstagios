<?php

namespace Model;

use Model\VO\AreasVO;
use Util\Database;

final class AreasModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("SELECT * FROM areas");

        $array = [];

        foreach($data as $row) {
            $array[] = new AreasVO($row['id'], $row['nome']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "SELECT * FROM areas WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }

        return new AreasVO($data[0]['id'], $data[0]['nome']);
    
    }

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO areas (nome) VALUES (:nome)";
        $binds = [
            ":nome" => $vo->getNome()
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
        $query = "UPDATE areas SET nome = :nome WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM professores WHERE areas_id = :id;
        DELETE FROM estagios WHERE areas_id = :id;
        DELETE FROM areas WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

}
