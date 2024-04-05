<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Documentos</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Documentos</h1>
    <a href="documento.php" id="botao_ir_form">Inserir nova documento!</a>
    <p id='aviso'>Para ver o estágio, clique no nome do aluno!</p>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome do Estudante</td>
                        <td>Matrícula</td>
                        <td>Termo<br>Compromisso</td>
                        <td>Plano<br>Atividade</td>
                        <td>Ficha<br>Autoavaliação</td>
                        <td>Ficha<br>Avaliacação da empresa</td>
                        <td>Relatório final</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($documentos as $documento) {
                            echo "<tr>";
                            echo "<td><a target='_blank' href='estudantes.php?id=". $documento->getAlunosMatricula() ."'>". $documento->getAlunosNome() ."</a></td>";
                            echo "<td>". $documento->getAlunosMatricula() ."</td>";
                            echo "<td><a target='_blank' href='". $documento->getTermoDeCompromisso() ."'>". $documento->getTermoDeCompromisso() . "</a></td>";
                            echo "<td><a target='_blank' href='". $documento->getPlanoDeAtividade() ."'>". $documento->getPlanoDeAtividade() . "</a></td>";
                            echo "<td><a target='_blank' href='". $documento->getFichaAutoavaliacao() ."'>". $documento->getFichaAutoavaliacao() . "</a></td>";
                            echo "<td><a target='_blank' href='". $documento->getFichaAvaliacaoEmpresa() ."'>". $documento->getFichaAvaliacaoEmpresa() . "</a></td>";
                            echo "<td><a target='_blank' href='". $documento->getRelatorioFinal() ."'>". $documento->getRelatorioFinal() . "</a></td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'documento.php?id=". $documento->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirdocumentos.php?id=". $documento->getId() . "'><i class='fa-solid fa-trash'></i></a>";
                            echo "</td>";
                            echo "</tr>";
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