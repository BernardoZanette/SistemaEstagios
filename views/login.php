<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Estagios</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div id="all">
    <div id="left">
    <h1>Gerenciador de Estagios</h1>
    <img src="https://ifrs.edu.br/wp-content/uploads/2017/08/logo_vertical.png" id="logo" alt="IFRS">
    </div>
    <div id="right">
    <form action="fazerLogin.php" method="post">
            <div id="form">
            <input type="text" name="login" id="login" placeholder="Login">
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <button id="btn" type="submit">Entrar</button>
        </div>
    </form>
    </div>
    </div>
</body>
</html>