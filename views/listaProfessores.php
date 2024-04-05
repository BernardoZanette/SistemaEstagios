<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Professores</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Professores</h1>
    <a href="professor.php" id="botao_ir_form">Inserir novo professor!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Área</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($professores as $index => $professor) {
                            echo "<tr>";
                            echo "<td>". $professor->getNome() ."</td>";
                            echo "<td>". $professor->getEmail() ."</td>";
                            echo "<td>". $professor->getAreaNome() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'professor.php?id=". $professor->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirProfessores.php?id=". $professor->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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