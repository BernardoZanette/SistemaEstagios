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
    <title>Formulário de Empresas</title>
</head>
<body>
    <?php 
        include('views/includes/menu.php');
    ?>
    <h1>Formulário da Empresa</h1>
    <a href="empresas.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarEmpresas.php" method="POST">
        <fieldset>
            <legend>Dados da Empresa</legend>
            <input type="hidden" name="id" value="<?php echo $empresas->getId() ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $empresas->getNome(); ?>">
            </div>
            <div>
                <label for="endereco">Endereço:</label>
                <input required type="text" name="endereco" id="endereco" value="<?php echo $empresas->getEndereco(); ?>">
            </div>
            <div>
                <label for="telefone">Telefone:</label>
                <input required type="text" name="telefone" id="telefone" value="<?php echo $empresas->getTelefone(); ?>" >
            </div>
            <div>
                <label for="email">Email:</label>
                <input required type="text" name="email" id="email" value="<?php echo $empresas->getEmail(); ?>" >    
            </div>
            <div>
                <label for="cnpj">CNPJ:</label>
                <input required type="text" name="cnpj" id="cnpj" value="<?php echo $empresas->getCnpj(); ?>" >
            </div>
            <div>
                <label for="cidades_id">Cidade:</label>
                <select required name="cidades_id" id="cidades_id">
                    <?php
                        foreach ($cidades as $cidade) {
                            echo "<option value = '". $cidade->getId() ."'>". $cidade->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="representantes_id">Representante:</label>
                <select required name="representantes_id" id="representantes_id">
                    <?php
                        foreach ($representantes as $representante) {
                            echo "<option value = '". $representante->getId() ."'>". $representante->getNome() ."</option>";
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