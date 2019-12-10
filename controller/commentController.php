<?php
if(!isset($_SESSION)){ 
  session_start();
}
require $_SERVER["DOCUMENT_ROOT"] . "/ycodes/model/commentModel.php";

$model = new commentModel();

$db = $model->getAll();

if(isset($_POST['newComment'])){
  $comment = $_POST['comment'];
  
  if(isset($_SESSION['username'])){
      $model->post($_SESSION['username'], $comment);
    }else{
      $model->post(null, $comment);
  }
  echo $comment;
}