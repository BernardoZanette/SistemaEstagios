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
    <title>Formulário de Área</title>
</head>
<body>
    <?php 
        require_once('views/includes/menu.php');
    ?>
    <h1>Formulário de Área</h1>
    <a href="areas.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarAreas.php" method="POST">
        <fieldset>
            <legend>Dados da Área</legend>
            <input type="hidden" name="id" value="<?php echo $areas->getId(); ?>">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $areas->getNome(); ?>">
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>