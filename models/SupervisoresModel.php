<?php

namespace Model;

use Model\VO\SupervisoresVO;
use Util\Database;

final class SupervisoresModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("
            SELECT supervisores.id, supervisores.nome, supervisores.formacao, 
            supervisores.telefone, supervisores.email, supervisores.empresas_id,
            empresas.nome as empresas_nome
            FROM supervisores
            JOIN empresas
            ON supervisores.empresas_id = empresas.id
        ");

        $array = [];

        foreach($data as $row) {
            $array[] = new SupervisoresVO($row['id'], $row['nome'], $row['formacao'], $row['telefone'], $row['email'], $row['empresas_id'], $row['empresas_nome']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "
            SELECT supervisores.id, supervisores.nome, supervisores.formacao, 
            supervisores.telefone, supervisores.email, supervisores.empresas_id,
            empresas.nome as empresas_nome
            FROM supervisores 
            JOIN empresas
            ON supervisores.empresas_id = empresas.id
            WHERE empresas.id = :id
        ";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }

        return new SupervisoresVO($data[0]['id'], $data[0]['nome'], $data[0]['formacao'], $data[0]['telefone'], $data[0]['email'], $data[0]['empresas_id'], $data[0]['empresas_nome']);
    
    }   

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO supervisores (nome, formacao, telefone, email, empresas_id) VALUES (:nome, :formacao, :telefone, :email, :empresas_id)";
        $binds = [
            ':nome' => $vo->getNome(), 
            ':formacao' => $vo->getFormacao(), 
            ':telefone' => $vo->getTelefone(), 
            ':email' => $vo->getEmail(), 
            ':empresas_id' => $vo->getEmpresasId()
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
        $query = "UPDATE supervisores SET nome = :nome, formacao = :formacao, telefone = :telefone, email = :email, empresas_id = :empresas_id WHERE id = :id";
        $binds = [
            ':id' => $vo->getId(),
            ':nome' => $vo->getNome(), 
            ':formacao' => $vo->getFormacao(), 
            ':telefone' => $vo->getTelefone(), 
            ':email' => $vo->getEmail(), 
            ':empresas_id' => $vo->getEmpresasId()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM estagios WHERE supervisores_id = :id;
        DELETE FROM supervisores WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

}
