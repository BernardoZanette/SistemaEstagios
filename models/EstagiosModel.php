<?php

namespace Model;

use Model\VO\EstagiosVO;
use Util\Database;

final class EstagiosModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("
        SELECT estagios.id, estagios.carga_horaria, estagios.empresas_id, 
        estagios.estudantes_matricula, estagios.orientadores_id, estagios.areas_id, 
        estagios.supervisores_id, estagios.data_inicio, tipo_processos, encaminhamentos, 
        
        (SELECT representantes.id FROM representantes 
        JOIN empresas ON empresas.representantes_id = representantes.id
        LIMIT 1) 
        as representantes_id,
        
        (SELECT representantes.nome FROM representantes 
        JOIN empresas ON empresas.representantes_id = representantes.id
        LIMIT 1) 
        as representantes_nome,
        
        estagios.previsao_fim, estagios.data_fim, estagios.coorientadores_id,
        empresas.nome as empresas_nome, estudantes.nome as estudantes_nome,
        professores.nome as orientadores_nome, areas.nome as areas_nome,
        supervisores.nome as supervisores_nome, professores.nome as coorientadores_nome
        FROM estagios
        JOIN empresas
        ON estagios.empresas_id = empresas.id
        JOIN estudantes
		ON estagios.estudantes_matricula = estudantes.matricula
        JOIN professores
        ON estagios.orientadores_id = professores.id
        JOIN areas
        ON estagios.areas_id = areas.id
        JOIN supervisores
        ON estagios.supervisores_id = supervisores.id
        ");

        $array = [];

        foreach($data as $row) {
            $array[] = new EstagiosVO($row['id'], $row['carga_horaria'], $row['empresas_id'], $row['empresas_nome'], $row['estudantes_matricula'],
            $row['estudantes_nome'], $row['orientadores_id'], $row['orientadores_nome'],
            $row['areas_id'], $row['areas_nome'], $row['supervisores_id'], $row['supervisores_nome'], $row['data_inicio'],
            $row['previsao_fim'] , '?', $row['coorientadores_id'], $row['coorientadores_nome'],
            $row['tipo_processos'], $row['encaminhamentos'],  $row['representantes_id'], $row['representantes_nome']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "
        SELECT estagios.id, estagios.carga_horaria, estagios.empresas_id, 
        estagios.estudantes_matricula, estagios.orientadores_id, estagios.areas_id, 
        estagios.supervisores_id, estagios.data_inicio, tipo_processos, encaminhamentos, 
        
        (SELECT representantes.id FROM representantes 
        JOIN empresas ON empresas.representantes_id = representantes.id
        LIMIT 1) 
        as representantes_id,
        
        (SELECT representantes.nome FROM representantes 
        JOIN empresas ON empresas.representantes_id = representantes.id
        LIMIT 1) 
        as representantes_nome,
        
        estagios.previsao_fim, estagios.data_fim, estagios.coorientadores_id,
        empresas.nome as empresas_nome, estudantes.nome as estudantes_nome,
        professores.nome as orientadores_nome, areas.nome as areas_nome,
        supervisores.nome as supervisores_nome, professores.nome as coorientadores_nome
        FROM estagios
        JOIN empresas
        ON estagios.empresas_id = empresas.id
        JOIN estudantes
		ON estagios.estudantes_matricula = estudantes.matricula
        JOIN professores
        ON estagios.orientadores_id = professores.id
        JOIN areas
        ON estagios.areas_id = areas.id
        JOIN supervisores
        ON estagios.supervisores_id = supervisores.id
        WHERE estagios.id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        if (count($data) == 0) {
            return null;
        }

        return new EstagiosVO($data[0]['id'], $data[0]['carga_horaria'], $data[0]['empresas_id'], $data[0]['empresas_nome'], $data[0]['estudantes_matricula'],
        $data[0]['estudantes_nome'], $data[0]['orientadores_id'], $data[0]['orientadores_nome'],
        $data[0]['areas_id'], $data[0]['areas_nome'], $data[0]['supervisores_id'], $data[0]['supervisores_nome'], $data[0]['data_inicio'],
        $data[0]['previsao_fim'] , $data[0]['data_fim'], $data[0]['coorientadores_id'], $data[0]['coorientadores_nome'],
        $data[0]['tipo_processos'], $data[0]['encaminhamentos'], $data[0]['representantes_id'], $data[0]['representantes_nome']);
    
    }

    public function insert($vo) {

        $db = new Database();
        $query = "INSERT INTO estagios (carga_horaria,empresas_id,estudantes_matricula,orientadores_id,areas_id,supervisores_id,
        data_inicio,previsao_fim,data_fim,coorientadores_id, tipo_processos, encaminhamentos) 
        VALUES (:carga_horaria, :empresas_id, :estudantes_matricula,:orientadores_id,:areas_id,:supervisores_id,
        :data_inicio,:previsao_fim,:data_fim,:coorientadores_id, :tipo_processos, :encaminhamentos)";
        $binds = [
            ':carga_horaria' => $vo->getCargaHoraria(),
            ':empresas_id' => $vo->getEmpresasId(),
            ':estudantes_matricula' => $vo->getEstudantesMatricula(),
            ':orientadores_id' => $vo->getOrientadoresId(),
            ':areas_id' => $vo->getAreasId(),
            ':supervisores_id' => $vo->getSupervisoresId(),
            ':data_inicio' => $vo->getDataInicio(),
            ':previsao_fim' => $vo->getPrevisaoFim(),
            ':data_fim' => $vo->getDataFim(),
            ':coorientadores_id' => $vo->getCoorientadoresId(),
            ':tipo_processos' => $vo->getTipoProcesso(),
            ':encaminhamentos' => $vo->getEncaminhamentos()
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
    
        $query = "UPDATE estagios SET carga_horaria = :carga_horaria,empresas_id = 
        :empresas_id,estudantes_matricula = :estudantes_matricula, orientadores_id = :orientadores_id,
        areas_id = :areas_id,supervisores_id = :supervisores_id,data_inicio = :data_inicio, previsao_fim = :previsao_fim, data_fim = :data_fim, coorientadores_id = :coorientadores_id, 
        tipo_processos = :tipo_processos, encaminhamentos = :encaminhamentos WHERE id = :id";

        $binds = [
            ':carga_horaria' => $vo->getCargaHoraria(),
            ':empresas_id' => $vo->getEmpresasId(),
            ':estudantes_matricula' => $vo->getEstudantesMatricula(),
            ':orientadores_id' => $vo->getOrientadoresId(),
            ':areas_id' => $vo->getAreasId(),
            ':supervisores_id' => $vo->getSupervisoresId(),
            ':data_inicio' => $vo->getDataInicio(),
            ':previsao_fim' => $vo->getPrevisaoFim(),
            ':data_fim' => $vo->getDataFim(),
            ':coorientadores_id' => $vo->getCoorientadoresId(),
            ':tipo_processos' => $vo->getTipoProcesso(),
            ':encaminhamentos' => $vo->getEncaminhamentos(),
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "
        DELETE FROM documentos WHERE estagios_id = :id;
        DELETE FROM estagios WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }
    
}