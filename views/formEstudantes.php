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
    <title>Formulário de Estudantes</title>
</head>
<body>
    <?php 
       include('views/includes/menu.php');
    ?>
    <h1>Formulário de Estudantes</h1>
    <a href="estudantes.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarEstudantes.php" method="POST">
        <fieldset>
            <legend>Dados do Estudante</legend>
            <input type="hidden" name="id" value="<?php echo $estudantes->getId() ?>">
            <div>
                <label for="matricula">Matricula:</label>
                <input required type="number" name="matricula" id="matricula" value="<?php echo $estudantes->getMatricula(); ?>">
            </div>
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $estudantes->getNome(); ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input required type="email" name="email" id="email" value="<?php echo $estudantes->getEmail(); ?>">
            </div>
            <div>
                <label for="cpf">CPF:</label>
                <input required type="text" name="cpf" id="cpf" value="<?php echo $estudantes->getCpf(); ?>">
            </div>
            <div>
                <label for="rg">RG:</label>
                <input required type="text" name="rg" id="rg" value="<?php echo $estudantes->getRg(); ?>">
            </div>
            <div>
                <label for="endereco">Endereço:</label>
                <input required type="text" name="endereco" id="endereco" value="<?php echo $estudantes->getEndereco(); ?>">
            </div>
            <div>
                <label for="telefone">Telefone:</label>
                <input required type="text" name="telefone" id="telefone" value="<?php echo $estudantes->getTelefone(); ?>">
            </div>
            <div>
                <label for="cidades_id">Cidades:</label>
                <select name="cidades_id" id="cidades_id">
                    <?php
                        foreach ($cidades as $cidade) {
                            echo "<option value = '". $cidade->getId() ."'>". $cidade->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="cursos_id">Cursos:</label>
                <select name="cursos_id" id="cursos_id">
                    <?php
                        foreach ($cursos as $curso) {
                            echo "<option value = '". $curso->getId() ."'>". $curso->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="num_turma">Turma</label>
                <select name="num_turma" id="num_turma">
                    <option value="1">1° ano</option>
                    <option value="2">2° ano</option>
                    <option value="3">3° ano</option>
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