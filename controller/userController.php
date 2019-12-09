<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . "/ycodes/model/userModel.php";

$model = new userModel();

$db = $model->getAll();

if (isset($_POST['userNew'])) {
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$model->post($user, $pass);
}