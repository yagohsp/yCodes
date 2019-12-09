<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Solway:400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png">
    <title>yCodes</title>
</head>

<body>
    <div class="container">
    <div>
        <h1 id="typing"></h1>
    </div>
    
        <form class="login-form" method="POST" action="controller/userController.php">
            <input type="text" name="user" placeholder="Usuário">
            <input type="password" name="pass" placeholder="Senha">
            <div class="account-buttons">
                <button type="submit" name="userLogin">Entrar</button>
                <button type="submit" name="userNew">Cadastrar</button>
            </div>
        </form>
        <button class="feedback-button">Feedback anônimo</button>
        <div id="content" style="display:none"></div>
    </div>

    <span style="position: absolute; bottom: 0; right: 0; padding: 5px; color:navy;">
        Desenvolvido por Yago Henrique
    </span>

    <ul class="squares">
    </ul>
    <script src="js/script.js"></script>
</body>

</html>