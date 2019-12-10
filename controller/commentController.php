<?php
require $_SERVER["DOCUMENT_ROOT"] . "/ycodes/model/commentModel.php";

$model = new commentModel();

$db = $model->getAll();

if(isset($_POST['newComment'])){
  $comment = $_POST['comment'];

  $model->post(null, $comment);

  echo $comment;
}