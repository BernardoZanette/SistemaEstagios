<?php

namespace Model;

use Model\VO\EstudantesVO;
use Util\Database;

final class EstudantesModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("
            SELECT estudantes.matricula, estudantes.nome, estudantes.email, estudantes.cpf, estudantes.rg, estudantes.endereco, estudantes.telefone,
            cidades_id, cidades.nome as cidades_nome, cursos_id, cursos.nome as cursos_nome, num_turma 
            FROM estudantes
            JOIN cidades
            ON estudantes.cidades_id = cidades.id
            JOIN cursos
            ON estudantes.cursos_id = cursos.id
        ");

        $array = [];

        foreach($data as $row) {
            $array[] = new EstudantesVO($row['matricula'], $row['nome'], $row['email'], $row['cpf'], $row['rg'], $row['endereco'], $row['telefone'], $row['cidades_id'], $row['cidades_nome'], $row['cursos_id'], $row['cursos_nome'], $row['num_turma']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "
            SELECT estudantes.matricula, estudantes.nome, estudantes.email, estudantes.cpf, estudantes.rg, estudantes.endereco, estudantes.telefone,
            cidades_id, cidades.nome as cidades_nome, cursos_id, cursos.nome as cursos_nome, num_turma 
            FROM estudantes
            JOIN cidades
            ON estudantes.cidades_id = cidades.id
            JOIN cursos
            ON estudantes.cursos_id = cursos.id WHERE matricula = :matricula
        ";
        $binds = [":matricula" => $vo->getMatricula()];
        $data = $db->select($query, $binds);
        
        if (count($data) == 0) {
            return null;
        }

        return new EstudantesVO($data[0]['matricula'], $data[0]['nome'], $data[0]['email'], $data[0]['cpf'], $data[0]['rg'], $data[0]['endereco'], $data[0]['telefone'], $data[0]['cidades_id'], $data[0]['cidades_nome'], $data[0]['cursos_id'], $data[0]['cursos_nome'], $data[0]['num_turma']);
    
    }

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO estudantes (matricula, nome, email, cpf, rg, endereco, telefone, cidades_id, cursos_id, num_turma) VALUES (:matricula, :nome, :email, :cpf, :rg, :endereco, :telefone, :cidades_id, :cursos_id, :num_turma)";
        $binds = [
            ':matricula' => $vo->getMatricula(),
            ':nome' => $vo->getNome(),
            ':email' => $vo->getEmail(),
            ':cpf' => $vo->getCpf(),
            ':rg' => $vo->getRg(),
            ':endereco' => $vo->getEndereco(),
            ':telefone' => $vo->getTelefone(),
            ':cidades_id' => $vo->getCidadesId(),   
            ':cursos_id' => $vo->getCursosId(),
            ':num_turma' => $vo->getNumTurma()
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
    
        $query = "UPDATE estudantes SET matricula = :matricula, nome = :nome, email = :email, cpf = :cpf, rg = :rg, endereco = :endereco, telefone = :telefone, cidades_id = :cidades_id, cursos_id = :cursos_id, num_turma = :num_turma WHERE matricula = :id";
        $binds = [
            ":id" => $_POST['id'],
            ":matricula" => $vo->getMatricula(),
            ':nome' => $vo->getNome(),
            ':email' => $vo->getEmail(),
            ':cpf' => $vo->getCpf(),
            ':rg' => $vo->getRg(),
            ':endereco' => $vo->getEndereco(),
            ':telefone' => $vo->getTelefone(),
            ':cidades_id' => $vo->getCidadesId(),
            ':cursos_id' => $vo->getCursosId(),
            ':num_turma' => $vo->getNumTurma()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM estagios WHERE estudantes_matricula = :matricula;
        DELETE FROM estudantes WHERE matricula = :matricula";
        $binds = [
            ":matricula" =>  $vo->getMatricula()
        ];

        return $db->execute($query, $binds);

    }


}