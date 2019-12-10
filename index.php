<?php
session_start();
include('controller/commentController.php');
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
    <div id="message" class="message">
        <span></span>
    </div>
    <div class="container">

        <div>
            <h1 id="typing"></h1>
        </div>

        <form class="user-form">
            <input type="text" id="user" placeholder="Usuário">
            <input type="password" id="pass" placeholder="Senha">
            <div class="account-buttons">
                <?php
                if(!isset($_SESSION['username'])){
                    echo '<button id="userLogin">Entrar</button>';
                    echo '<button id="userNew">Cadastrar</button>';
                }else{
                    echo '<button>Sair</button>';
                }
                ?>
                
                
            </div>
        </form>

        <button class="feedback-button" id="feedback-button">Feedback anônimo</button>

        <div id="content" style="display: none">
            <div class="feedback-box" id="feedback-box">
                <?php
                while ($row = $db->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div><span>" . $row['comentario'] . "</span></div>";
                }
                ?>
            </div>
            <form class="feedback-form" id="commentForm">
                <input type="text" id="comment" placeholder="Comente algo..."></input>
                <button id="newComment">Enviar</button>
            </form>
        </div>
    </div>

    <span style="position: absolute; bottom: 0; right: 0; padding: 5px; color:navy;">
        Desenvolvido por Yago Henrique
    </span>

    <ul class="squares">
    </ul>
    <script src="js/script.js"></script>
</body>

</html>