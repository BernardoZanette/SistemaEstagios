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
    <title>Formulário de Documentos</title>
</head>
<body>
    <?php 
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Documento</h1>
    <a href="documentos.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarDocumentos.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Dados de Documentos</legend>
            <input type="hidden" name="id" value="<?php echo $documentos->getId() ?>">
            <div>
                <label for="estagios_id">Selecionar Estagio:</label>
                <select required name="estagios_id" id="estagios_id">
                    <?php
                        foreach ($estagios as $estagio) {
                            echo "<option value = '". $estagio->getId() ."'>". $estagio->getEstudantesNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="termo_de_compromisso" class="label_file">Enviar Termo de Compromisso!</label>
                <input type="file" name="termo_de_compromisso" id="termo_de_compromisso">
            </div>
            <div>
                <label for="plano_de_atividade" class="label_file">Enviar Plano de Atividade!</label>
                <input type="file" name="plano_de_atividade" id="plano_de_atividade">
            </div>
            <div>
                <label for="ficha_autoavaliacao" class="label_file">Enviar Ficha Autoavaliação!</label>
                <input type="file" name="ficha_autoavaliacao" id="ficha_autoavaliacao">
            </div>
            <div>
                <label for="ficha_avaliacao_empresa" class="label_file">Enviar Ficha avaliação empresa!</label>
                <input type="file" name="ficha_avaliacao_empresa" id="ficha_avaliacao_empresa">
            </div>
            <div>
                <label for="relatorio_final" class="label_file">Relatório Final!</label>
                <input type="file" name="relatorio_final" id="relatorio_final">
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>