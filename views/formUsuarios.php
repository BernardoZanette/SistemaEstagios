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
    <title>Formulário de Usuarios</title>
</head>
<body>
    <?php 
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Usuários</h1>
    <a href="usuarios.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <p id="aviso">Deixe o campo vazio caso queira manter a mesma senha.</p>
    <form action="salvarUsuarios.php" method="POST">
        <fieldset>
            <legend>Dados do Usuário</legend>
            <input type="hidden" name="id" value="<?php echo $usuarios->getId() ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $usuarios->getNome(); ?>">
            </div>
            <div>
                <label for="login">Login:</label>
                <input required type="text" name="login" id="login" value="<?php echo $usuarios->getLogin(); ?>">
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha">
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>