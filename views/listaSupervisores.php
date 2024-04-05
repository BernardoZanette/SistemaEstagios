<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Supervisores</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Supervisores</h1>
    <a href="supervisor.php" id="botao_ir_form">Inserir novo supervisor!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Formação</td>
                        <td>Telefone</td>
                        <td>Email</td>
                        <td>Empresa</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($supervisores as $index => $supervisor) {
                            echo "<tr>";
                            echo "<td>". $supervisor->getNome() ."</td>";
                            echo "<td>". $supervisor->getFormacao() ."</td>";
                            echo "<td>". $supervisor->getTelefone() ."</td>";
                            echo "<td>". $supervisor->getEmail() ."</td>";
                            echo "<td>". $supervisor->getEmpresasNome() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'supervisor.php?id=". $supervisor->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirSupervisores.php?id=". $supervisor->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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