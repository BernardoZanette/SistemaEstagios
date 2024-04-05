<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Empresas</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Empresas</h1>
    <a href="empresa.php" id="botao_ir_form">Inserir nova empresa!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Endereço</td>
                        <td>Telefone</td>
                        <td>Email</td>
                        <td>CNPJ</td>
                        <td>Cidade</td>
                        <td>Representante</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($empresas as $index => $empresa) {
                            echo "<tr>";
                            echo "<td>". $empresa->getNome() ."</td>";
                            echo "<td>". $empresa->getEndereco() ."</td>";
                            echo "<td>". $empresa->getTelefone() ."</td>";
                            echo "<td>". $empresa->getEmail() ."</td>";
                            echo "<td>". $empresa->getCnpj() ."</td>";
                            echo "<td>". $empresa->getCidadeNome() ."</td>";
                            echo "<td>". $empresa->getRepresentanteNome() ."</td>";
                            echo "<td id='td_funcoes'>";
                                echo "<a href = 'empresa.php?id=". $empresa->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                echo "<a href = 'excluirEmpresas.php?id=". $empresa->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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