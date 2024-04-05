<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Cursos</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Cursos</h1>
    <a href="curso.php" id="botao_ir_form">Inserir novo curso!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($cursos as $index => $curso) {
                            echo "<tr>";
                                echo "<td>". $curso->getNome() ."</td>";
                                echo "<td id='td_funcoes'>";
                                    echo "<a href = 'curso.php?id=". $curso->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                    echo "<a href = 'excluirCursos.php?id=". $curso->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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