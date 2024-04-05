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
    <title>Formulário de Professores</title>
</head>
<body>
    <?php
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Professores</h1>
    <a href="professores.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarProfessores.php" method="POST">
        <fieldset>
            <legend>Dados de Professor</legend>
            <input type="hidden" name="id" value="<?php echo $professores->getId() ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $professores->getNome(); ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input required type="email" name="email" id="email" value="<?php echo $professores->getEmail(); ?>">
            </div>
            <div>
                <label for="areas_id">Área:</label>
                <select required name="areas_id" id="areas_id">
                    <?php
                        foreach ($areas as $area) {
                            echo "<option value='". $area->getId()."'>". $area->getNome() ."</option>";
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