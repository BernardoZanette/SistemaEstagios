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
    <title>Formulário de Supervisores</title>
</head>
<body>
    <?php
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Supervisores</h1>
    <a href="supervisores.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarSupervisores.php" method="POST">
        <fieldset>
            <legend>Dados de Supervisor</legend>
            <input type="hidden" name="id" value="<?php echo $supervisores->getId() ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $supervisores->getNome(); ?>">
            </div>
            <div>
                <label for="formacao">Formação:</label>
                <input required type="text" name="formacao" id="formacao" value="<?php echo $supervisores->getFormacao(); ?>">
            </div>
            <div>
                <label for="telefone">Telefone:</label>
                <input required type="text" name="telefone" id="telefone" value="<?php echo $supervisores->getTelefone(); ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input required type="text" name="email" id="email" value="<?php echo $supervisores->getEmail(); ?>">
            </div>
            <div>
                <label for="empresas_id">Empresa</label>
                <select name="empresas_id" id="empresas_id">
                    <?php
                        foreach ($empresas as $empresa) {
                            echo "<option value = '". $empresa->getId() ."'>". $empresa->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>