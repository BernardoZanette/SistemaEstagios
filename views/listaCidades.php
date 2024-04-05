<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Cidades</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Cidades</h1>
    <a href="cidade.php" id="botao_ir_form">Inserir nova cidade!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>UF</td>
                        <td>CEP</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($cidades as $index => $cidade) {
                            echo "<tr>";
                            echo "<td>". $cidade->getNome() ."</td>";
                            echo "<td>". $cidade->getUf() ."</td>";
                            echo "<td>". $cidade->getCep() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'cidade.php?id=". $cidade->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirCidades.php?id=". $cidade->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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