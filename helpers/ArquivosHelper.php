<?php

    function gravarArquivo ($arquivo, $diretorio = "arquivos/") {
        if ($arquivo['error']) {
            return false;
        } else {
            
            // $nome_completo_arquivo = $diretorio . $arquivo['name'];
        
            $nome_arquivo = uniqid(); 
            // gera nome aleatório
            $extensao_arquivo = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            // pega informações de um arquivo no diretório
            // segundo parametro: qual informação eu quero
            $nome_completo_arquivo = $diretorio . $nome_arquivo . "." . $extensao_arquivo;
            
            $sucesso = move_uploaded_file($arquivo['tmp_name'], $nome_completo_arquivo); 
            // primeiro parametro: qual arquivo quero mover 
            // segundo *: para onde quero mover
            // função move e renomeia
        
            return $sucesso ? $nome_completo_arquivo : false;

        }
    }