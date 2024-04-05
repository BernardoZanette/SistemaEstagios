<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <link rel="stylesheet" href="styles/estagios.css">
    <title>Estágios</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Estágios</h1>
    <a href="estagio.php" id="botao_ir_form">Inserir novo estágio!</a>
    <p id='aviso'>Para ver mais informações, clique no nome correspondente ao cabeçalho!</p>
    <div class="container">
        <div id='div_tabela_estagios'>
            <table>
                <thead>
                    <tr>
                        <td>Estudante</td>
                        <td>Empresa</td>
                        <td>Tipo<br>Processo</td>
                        <td>Encaminhamentos Seção</td>
                        <td>Período</td>
                        <td>Área</td>
                        <td>Carga Horária</td>
                        <td>Orientador</td>
                        <td>Coorientador</td>
                        <td>Supervisor</td>
                        <td>Representante</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($estagios as $estagio) {
                            echo "<tr>";
                            echo "<td><a href='estudante.php?id=" . $estagio->getEstudantesMatricula() . "'>" . $estagio->getEstudantesNome() . "</a></td>";
                            echo "<td><a href='empresa.php?id=". $estagio->getEmpresasId()."'>". $estagio->getEmpresasNome() ."</td>";
                            echo "<td>". ucfirst($estagio->getTipoProcesso()) ."</td>";
                            echo "<td>". $estagio->getEncaminhamentos() ."</td>";
                            echo "<td>". $estagio->getDataInicio() ."/". $estagio->getPrevisaoFim() ."</td>";
                            echo "<td><a href='area.php?id=". $estagio->getAreasId()."'>". $estagio->getAreasNome() ."</td>";
                            echo "<td>". $estagio->getCargaHoraria() ."</td>";
                            echo "<td><a href='professor.php?id=". $estagio->getOrientadoresId()."'>". $estagio->getOrientadoresNome() ."</a></td>";
                            echo "<td><a href='professor.php?id=". $estagio->getCoorientadoresId()."'>". $estagio->getCoorientadoresNome() ."</a></td>";
                            echo "<td><a href='supervisor.php?id=". $estagio->getSupervisoresId()."'>". $estagio->getSupervisoresNome() ."</a></td>";
                            echo "<td><a href='representante.php?id=". $estagio->getRepresentantesId()."'>". $estagio->getRepresentantesNome() ."</a></td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'estagio.php?id=". $estagio->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirEstagios.php?id=". $estagio->getId() . "'><i class='fa-solid fa-trash'></i></a>";
                            echo "</td>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        require_once("views/includes/linksJS.html");
    ?>
</body>
</html>