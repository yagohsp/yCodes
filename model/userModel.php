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

    public function get($user, $pass){
      $conn = $this->database->getConnection();

      $query = $conn->prepare("SELECT * FROM usuario where nome = :user AND senha = :pass");
      
      $query->bindParam(":user", $user);
      $query->bindParam(":pass", $pass);

      $query->execute();
  
      return $query->rowCount();

      if($query->rowCount() === 1){
        echo 1;
      }
    }

    public function post($user, $pass){
      $conn = $this->database->getConnection();

      $validate = $conn->prepare("SELECT * FROM usuario where nome = :user");
      $validate->bindParam(":user", $user);
      $validate->execute();

      if($validate->rowCount() > 0){
        return 0;
      }else{
        echo 1;
      }
    
      $query = $conn->prepare("INSERT INTO usuario(nome, senha) VALUES(:user, :pass)");

      $query->bindParam(":user", $user);
      $query->bindParam(":pass", $pass);

      $query->execute();
    }

  }
