<?php

namespace Model;

use Model\VO\DocumentosVO;
use Util\Database;

final class DocumentosModel extends Model {

    public function selectAll($vo = null) {
        $db = new Database();
        $data = $db->select("
        SELECT documentos.id, estagios_id, documentos.termo_de_compromisso, 
        documentos.plano_de_atividade, documentos.ficha_autoavaliacao, documentos.ficha_avaliacao_empresa,
        documentos.relatorio_final, (SELECT estudantes.matricula FROM estagios JOIN estudantes ON estudantes.matricula = estudantes_matricula LIMIT 1) as estudantes_matricula,
        (SELECT estudantes.nome FROM estagios JOIN estudantes ON estudantes.matricula = estudantes_matricula LIMIT 1) as estudantes_nome
        FROM documentos
        ");

        $array = [];

        foreach($data as $row) {
            $array[] = new DocumentosVO($row['id'], $row['estagios_id'], $row['termo_de_compromisso'], $row['plano_de_atividade'], $row['ficha_autoavaliacao'], $row['ficha_avaliacao_empresa'], $row['relatorio_final'], $row['estudantes_nome'], $row['estudantes_matricula']);            
        }

        return $array;
    }

    public function selectOne($vo = null) {
        $db = new Database();
        $query = "
        SELECT documentos.id, estagios_id, documentos.termo_de_compromisso, 
        documentos.plano_de_atividade, documentos.ficha_autoavaliacao, documentos.ficha_avaliacao_empresa,
        documentos.relatorio_final, (SELECT estudantes.matricula FROM estagios JOIN estudantes ON estudantes.matricula = estudantes_matricula LIMIT 1) as estudantes_matricula,
        (SELECT estudantes.nome FROM estagios JOIN estudantes ON estudantes.matricula = estudantes_matricula LIMIT 1) as estudantes_nome
        FROM documentos
        JOIN empresas
        ON empresas.id = estagios_id
        WHERE documentos.id = :id
        ";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        if (count($data) == 0) {
            return null;
        }
    
        return new DocumentosVO($data[0]['id'], $data[0]['estagios_id'], $data[0]['termo_de_compromisso'], $data[0]['plano_de_atividade'], $data[0]['ficha_autoavaliacao'], $data[0]['ficha_avaliacao_empresa'], $data[0]['relatorio_final'], $data[0]['estudantes_matricula'], $data[0]['estudantes_nome']);
    }   

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO documentos (estagios_id, termo_de_compromisso, plano_de_atividade, ficha_autoavaliacao, ficha_avaliacao_empresa, relatorio_final)
        VALUES (:estagios_id, :termo_de_compromisso, :plano_de_atividade, :ficha_autoavaliacao, :ficha_avaliacao_empresa, :relatorio_final)";
        $binds = [
            ':estagios_id' => $vo->getEstagiosId(),
            ':termo_de_compromisso' => $vo->getTermoDeCompromisso(),
            ':plano_de_atividade' => $vo->getPlanoDeAtividade(),
            ':ficha_autoavaliacao' => $vo->getFichaAutoavaliacao(),
            ':ficha_avaliacao_empresa' => $vo->getFichaAvaliacaoEmpresa(),
            ':relatorio_final' => $vo->getRelatorioFinal()
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
        $query = "UPDATE documentos SET estagios_id = :estagios_id, 
        termo_de_compromisso = :termo_de_compromisso, plano_de_atividade = :plano_de_atividade,
        ficha_autoavaliacao = :ficha_autoavaliacao, ficha_avaliacao_empresa = :ficha_avaliacao_empresa, relatorio_final = :relatorio_final
        WHERE id = :id";
        $binds = [
            ':id' => $vo->getId(),
            ':estagios_id' => $vo->getEstagiosId(),
            ':termo_de_compromisso' => $vo->getTermoDeCompromisso(),
            ':plano_de_atividade' => $vo->getPlanoDeAtividade(),
            ':ficha_autoavaliacao' => $vo->getFichaAutoavaliacao(),
            ':ficha_avaliacao_empresa' => $vo->getFichaAvaliacaoEmpresa(),
            ':relatorio_final' => $vo->getRelatorioFinal()
        ];

        return $db->execute($query, $binds);

    }

    public function delete($vo) {

        $db = new Database();
        $query = "DELETE FROM documentos WHERE id = :id";
        $binds = [
            ":id" =>  $vo->getId()
        ];

        return $db->execute($query, $binds);

    }

}
