<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once("views/includes/links_uteis.html");
    ?>
    <title>Usuários</title>
</head>
<body>
    <?php
        require_once('views/includes/menu.php');
    ?>
    <h1>Usuários</h1>
    <a href="usuario.php" id="botao_ir_form">Inserir novo usuário!</a>
    <div class="container">
        <div id="div_tabela">
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Login</td>
                        <td>Senha</td>
                        <td>Funções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($usuarios as $usuario) {
                            echo "<tr>";
                                echo "<td>". $usuario->getNome() ."</td>";
                                echo "<td>". $usuario->getLogin() ."</td>";
                                echo "<td id='senha'>*****</td>";
                                echo "<td id='td_funcoes'>";
                                    echo "<a href = 'usuario.php?id=". $usuario->getId() . "'><i class='fa-solid fa-pencil'></i></a>";
                                    echo "<a href = 'excluirUsuarios.php?id=". $usuario->getId() . "'><i class='fa-solid fa-trash'></i></a>";
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