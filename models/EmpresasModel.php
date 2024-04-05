<?php

namespace Model;

use Model\VO\EmpresasVO;
use Util\Database;

final class EmpresasModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("SELECT empresas.id, empresas.nome, empresas.endereco, 
        empresas.telefone, empresas.email, empresas.cnpj, empresas.representantes_id, 
        representantes.nome as representantes_nome, empresas.cidades_id, cidades.nome as cidades_nome
        FROM empresas
        JOIN representantes
        ON empresas.representantes_id = representantes.id
        JOIN cidades 
        ON empresas.cidades_id = cidades.id");

        $array = [];

        foreach($data as $row) {
            $array[] = new EmpresasVO($row['id'], $row['nome'], $row['endereco'], $row['telefone'],
            $row['email'], $row['cnpj'], $row['representantes_id'], $row['representantes_nome'],
            $row['cidades_id'], $row['cidades_nome']);
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "SELECT empresas.id, empresas.nome, empresas.endereco, 
        empresas.telefone, empresas.email, empresas.cnpj, empresas.representantes_id, 
        representantes.nome as representantes_nome, empresas.cidades_id, cidades.nome as cidades_nome
        FROM empresas
        JOIN representantes
        ON empresas.representantes_id = representantes.id
        JOIN cidades 
        ON empresas.cidades_id = cidades.id
        WHERE empresas.id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }

        return new EmpresasVO($data[0]['id'], $data[0]['nome'], $data[0]['endereco'], $data[0]['telefone'], $data[0]['email'], $data[0]['cnpj'], $data[0]['representantes_id'], $data[0]['representantes_nome'], $data[0]['cidades_id'], $data[0]['cidades_nome']);
    
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO empresas
        (nome, endereco, telefone, email, cnpj, representantes_id, cidades_id) 
        VALUES (:nome, :endereco, :telefone, :email, :cnpj, :representantes_id, :cidades_id)";
        $binds = [
            ':nome' => $vo->getNome(),
            ':endereco' => $vo->getEndereco(),
            ':telefone' => $vo->getTelefone(),
            ':email' => $vo->getEmail(),
            ':cnpj' => $vo->getCnpj(),
            ':representantes_id' => $vo->getRepresentantesId(),
            ':cidades_id' => $vo->getCidadesId()
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

        $query = "UPDATE empresas SET nome = :nome,  endereco = :endereco,  telefone = :telefone,  email = :email,  cnpj = :cnpj,  representantes_id = :representantes_id,  cidades_id = :cidades_id WHERE id = :id";
        $binds = [
            ':nome' => $vo->getNome(),
            ':endereco' => $vo->getEndereco(),
            ':telefone' => $vo->getTelefone(),
            ':email' => $vo->getEmail(),
            ':cnpj' => $vo->getCnpj(),
            ':representantes_id' => $vo->getRepresentantesId(),
            ':cidades_id' => $vo->getCidadesId(),
            ':id' => $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM supervisores WHERE empresas_id = :id;
        DELETE FROM estagios WHERE empresas_id = :id;
        DELETE FROM empresas WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }


}