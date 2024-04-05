<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Representantes</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Representantes</h1>
    <a href="representante.php" id="botao_ir_form">Inserir novo representante!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Função</td>
                        <td>CPF</td>
                        <td>RG</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($representantes as $index => $representante) {
                            echo "<tr>";
                            echo "<td>". $representante->getNome() ."</td>";
                            echo "<td>". $representante->getFuncao() ."</td>";
                            echo "<td>". $representante->getCpf() ."</td>";
                            echo "<td>". $representante->getRg() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'representante.php?id=". $representante->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirRepresentantes.php?id=". $representante->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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