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
    <title>Formulário de Cidades</title>
</head>
<body>
    <?php
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Cidades</h1>
    <a href="cidades.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarCidades.php" method="POST">
        <fieldset>
            <legend>Dados da Cidade</legend>
            <input type="hidden" name="id" value="<?php echo $cidades->getId() ?>">
            <div>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome" value="<?php echo $cidades->getNome(); ?>">
            </div>
            <div>
                <label for="cep">CEP:</label>
                <input required type="number" name="cep" id="cep" value="<?php echo $cidades->getCep(); ?>">
            </div>
            <div>
                <label for="uf">UF:</label>
                <select required name="uf" id="uf">
                    <?php
                    $ufs = ['RS', 'SC', 'PR', 'SP', 'MG', 'MS', 'GO'];
                    if ($cidades !== null) {
                        foreach ($ufs as $uf) {
                            echo "<option value='". $uf ."'>". $uf ."</option>";
                        }
                    }
                    else echo "<option value='". $cidades->getUf() ."'>". $cidades->getUf() ."</option>";
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