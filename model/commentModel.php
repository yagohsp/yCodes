<?php
  require $_SERVER['DOCUMENT_ROOT']."/ycodes/data/database.php";

  class commentModel{
    private $database;

    function __construct(){
      $this->database = new database();
    }

    public function getAll(){
      $conn = $this->database->getConnection();

      $query = $conn->query("SELECT * FROM comentario");
      
      return $query;
    }

    public function post($user, $comment){
      $conn = $this->database->getConnection();

      $query = $conn->prepare("INSERT INTO comentario(idUsuario, comentario) VALUES(:user, :comment)");

      $query->bindParam(":user", $user);
      $query->bindParam(":comment", $comment);

      return $query->execute();
    }
    

  }
?>