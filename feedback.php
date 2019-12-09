<?php
include('controller/commentController.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Solway:400&display=swap" rel="stylesheet">
    <title>Feedback</title>
</head>

<body>
    <div class="feedback-box" id="feedback-box">
        <?php
        while ($row = $db->fetch(PDO::FETCH_ASSOC)) {
            echo "<div><span>" . $row['comentario'] . "</span></div>";
        }
        ?>
    </div>
    <form class="feedback-form"  id="commentForm">
        <input type="text" name="comment" placeholder="Comente algo..."></input>
        <button type="submit">Enviar</button>
    </form>
    <script src="js/script.js"></script>
</body>

</html>