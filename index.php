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
                <?php
                 if(!isset($_SESSION['username'])){
                    echo'<input type="text" id="user" placeholder="Usuário">';
                    echo'<input type="password" id="pass" placeholder="Senha">';
                    echo '<div id="login-buttons">';
                    echo '<button id="userLogin">Entrar</button>';
                    echo '<button id="userNew">Cadastrar</button>';
                    echo '</div>';
                    echo '<div id="logout-buttons" style="display: none">';
                    echo '<button id="userLogout" onclick="logout()" disabled>Sair</button>';
                    echo '</div>';
                }else{
                    echo'<input type="text" id="user" placeholder="Usuário" style="display: none">';
                    echo'<input type="password" id="pass" placeholder="Senha" style="display: none">';
                    echo '<div id="login-buttons" style="display: none">';
                    echo '<button id="userLogin" disabled>Entrar</button>';
                    echo '<button id="userNew" disabled>Cadastrar</button>';
                    echo '</div>';
                    echo '<div id="logout-buttons">';
                    echo '<button onclick="logout()">Sair</button>';
                    echo '</div>';
                } 
                ?>
        </form>
        <?php 
            if(isset($_SESSION['username'])){
                echo'<button class="feedback-button" id="feedback-button">Feedback</button>';
            }else{
                echo'<button class="feedback-button" id="feedback-button">Feedback Anônimo</button>';
            }
        ?>
        
        <div id="content" style="display: none">
            <div class="feedback-box" id="feedback-box">
                <?php
                while ($row = $db->fetch(PDO::FETCH_ASSOC)) {
                    if($row['nome'] != null){
                        echo "<div><p style='font-size: 14px'>" . $row['nome'] . "</p>";
                        echo "<span>" . $row['comentario'] . "</span></div>";
                    }else{
                        echo "<div><p style='font-size: 14px'>Anônimo</p>";
                        echo "<span>" . $row['comentario'] . "</span></div>";
                    }
                }
                ?>
            </div>
            <form class="feedback-form" id="commentForm">
                <input type="text" id="comment" placeholder="Comente algo..." required></input>
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