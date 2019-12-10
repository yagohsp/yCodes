<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . "/ycodes/model/userModel.php";

$model = new userModel();

if (isset($_POST['userLogin'])) {
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  if($model->get($user, $pass) === 1){
    $_SESSION['username'] = $user;
    echo 1;
  }
}

if (isset($_POST['userNew'])) {
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  if($model->post($user, $pass) === 1){
    echo 1;
  }
}