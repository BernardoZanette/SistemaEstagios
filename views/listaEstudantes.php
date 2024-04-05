<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Estudantes</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Estudantes</h1>
    <a href="estudante.php" id="botao_ir_form">Inserir novo estudante!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Matricula</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>CPF</td>
                        <td>RG</td>
                        <td>Endereço</td>
                        <td>Telefone</td>
                        <td>Cidade</td>
                        <td>Turma</td>
                        <td>Cursos</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($estudantes as $index => $estudante) {
                            echo "<tr>";
                            echo "<td>". $estudante->getMatricula() ."</td>";
                            echo "<td>". $estudante->getNome() ."</td>";
                            echo "<td>". $estudante->getEmail() ."</td>";
                            echo "<td>". $estudante->getCpf() ."</td>";
                            echo "<td>". $estudante->getRg() ."</td>";
                            echo "<td>". $estudante->getEndereco() ."</td>";
                            echo "<td>". $estudante->getTelefone() ."</td>";
                            echo "<td>". $estudante->getCidadesNome() ."</td>";
                            echo "<td>". $estudante->getNumTurma() ."°</td>";
                            echo "<td>". $estudante->getCursosNome() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'estudante.php?id=". $estudante->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirEstudantes.php?id=". $estudante->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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