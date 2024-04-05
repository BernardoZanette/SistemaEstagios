<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <link rel="stylesheet" href="styles/form.css">
    <title>Formulário de Representantes</title>
</head>
<body>
    <?php 
        require_once('views/includes/menu.php');
    ?>
    <h1>Formulário de Representantes</h1>
    <a href="representantes.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarRepresentante.php" method="POST">
        <fieldset>
            <legend>Dados de Representante</legend>
            <input type="hidden" name="id" value="<?php echo $representantes->getId(); ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $representantes->getNome(); ?>">
            </div>
            <div>
                <label for="cpf">CPF:</label>
                <input required type="number" name="cpf" id="cpf" value="<?php echo $representantes->getCpf(); ?>">
            </div>
            <div>
                <label for="rg">Rg:</label>
                <input required type="number" name="rg" id="rg" value="<?php echo $representantes->getRg(); ?>">
            </div>
            <div>
                <label for="funcao">Função:</label>
                <input required type="text" name="funcao" id="funcao" value="<?php echo $representantes->getFuncao(); ?>">
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>