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
    <title>Formulário de Estágios</title>
</head>
<body>
    <?php
        include('views/includes/menu.php');
    ?>
    <h1>Formulário de Estágios</h1>
    <a href="estagios.php" id='botao_voltar_listagem'>Voltar para Listagem</a>
    <form action="salvarEstagios.php" method="POST">
        <fieldset>
            <legend>Dados de Estágios</legend>
            <input type="hidden" name="id" value="<?php echo $estagios->getId() ?>">
            <div>
                <label for="estudantes_matricula">Estudante:</label>
                <select required name="estudantes_matricula" id="estudantes_matricula">
                    <?php
                        if (isset($_GET['id'])) {
                            echo "<option value='". $estagios->getEstudantesMatricula() ."'>". $estagios->getEstudantesNome() ."</option>";
                        }
                        else {foreach ($estudantes as $estudante) {
                            echo "<option value='". $estudante->getMatricula() ."'>". $estudante->getNome() ."</option>";
                        }}
                    ?>
                </select>
            </div>
            <div>
                <label for="empresas_id">Empresa:</label>
                <select required name="empresas_id" id="empresas_id">
                    <?php
                        foreach ($empresas as $empresa) {
                            echo "<option value='". $empresa->getId() ."'>". $empresa->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="orientadores_id">Orientador:</label>
                <select required name="orientadores_id" id="orientadores_id">
                    <?php
                        foreach ($professores as $orientador) {
                            echo "<option value='". $orientador->getId() ."'>". $orientador->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="coorientadores_id">Coorientador:</label>
                <select required name="coorientadores_id" id="coorientadores_id">
                    <?php
                        foreach ($professores as $coorientador) {
                            echo "<option value='". $coorientador->getId() ."'>". $coorientador->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="areas_id">Área:</label>
                <select required name="areas_id" id="areas_id">
                    <?php
                        foreach ($areas as $area) {
                            echo "<option value='". $area->getId() ."'>". $area->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="supervisores_id">Supervisor:</label>
                <select required name="supervisores_id" id="supervisores_id">
                    <?php
                        foreach ($supervisores as $supervisor) {
                            echo "<option value='". $supervisor->getId() ."'>". $supervisor->getNome() ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="fisico">Físico</label>
                <input required type="radio" name="tipo_processos" value='fisico' id="fisico" <?php if($estagios->getTipoProcesso() == 'fisico') echo 'checked'; ?>>
                <label for="digital">Digital</label>
                <input required type="radio" name="tipo_processos" value='digital' id="digital" <?php if($estagios->getTipoProcesso() == 'digital') echo 'checked'; ?>>
            </div>
            <div>
                <label for="encaminhamentos">Encaminhamento:</label>
                <input required type="text" id="encaminhamentos" name="encaminhamentos" value='<?php echo $estagios->getEncaminhamentos(); ?>'>
            </div>
            <div>
                <label for="carga_horaria">Carga Horária:</label>
                <input required type="number" name="carga_horaria" id="carga_horaria" placeholder="(Em horas)" value='<?php echo $estagios->getCargaHoraria(); ?>'>
            </div>
            <div>
                <label for="data_inicio">Data de inicio:</label>
                <input required type="date" name="data_inicio" id="data_inicio" value='<?php echo $estagios->getDataInicio(); ?>'>
            </div>
            <div>
                <label for="previsao_fim">Previsão de fim:</label>
                <input required type="date" name="previsao_fim" id="previsao_fim" value='<?php echo $estagios->getPrevisaoFim(); ?>'>
            </div>
            <button id="botao_salvar" type="submit">Salvar</button>
        </fieldset>
    </form>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>