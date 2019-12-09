<?php 
  require $_SERVER['DOCUMENT_ROOT']."/ycodes/data/DataBase.php";

  class userModel{
    private $database;

    function __construct(){
      $this->database = new DataBase();
    }

    public function getAll(){
      $conn = $this->database->getConnection();

      $query = $conn->query("SELECT * FROM usuario");

      return $query;
    }

    public function post($user, $pass){
      $conn = $this->database->getConnection();

      $query = $conn->prepare("INSERT INTO usuario(nome, senha) VALUES(:user, :pass)");

      $query->bindParam(":user", $user);
      $query->bindParam(":pass", $pass);

      $query->execute();
    }

  }

?>