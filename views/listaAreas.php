<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Áreas</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Áreas</h1>
    <a href="area.php" id="botao_ir_form">Inserir nova área!</a>
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
                        foreach ($areas as $index => $area) {
                            echo "<tr>";
                            echo "<td>". $area->getNome() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'area.php?id=". $area->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirAreas.php?id=". $area->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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