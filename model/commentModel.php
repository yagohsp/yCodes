<?php
  require $_SERVER['DOCUMENT_ROOT']."/ycodes/data/database.php";

  class commentModel{
    private $database;

    function __construct(){
      $this->database = new database();
    }

    public function getAll(){
      $conn = $this->database->getConnection();

      $query = $conn->query("SELECT usuario.nome, comentario.comentario FROM comentario LEFT JOIN usuario ON comentario.idUsuario = usuario.idUsuario ORDER BY data");
      
      return $query;
    }

    public function post($user, $comment){
      $conn = $this->database->getConnection();

      $query = $conn->prepare("INSERT INTO comentario(idUsuario, comentario, data) VALUES((SELECT idUsuario FROM usuario WHERE nome = :user), :comment, NOW())");

      $query->bindParam(":user", $user);
      $query->bindParam(":comment", $comment);

      return $query->execute();
    }
  }
?>