<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . "/ycodes/model/commentModel.php";

$model = new commentModel();

$db = $model->getAll();

if(isset($_POST['comment'])){
  $comment = $_POST['comment'];

  $model->post("1", $comment);

  echo $comment;
}