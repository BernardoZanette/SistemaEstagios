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
    <title>Formulário de Curso</title>
</head>
<body>
    <?php 
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Curso</h1>
    <a href="cursos.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarCursos.php" method="POST">
        <fieldset>
            <legend>Dados do Curso</legend>
            <input type="hidden" name="id" value="<?php echo $cursos->getId() ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $cursos->getNome(); ?>">
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>