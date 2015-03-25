<?php
include_once 'lib.php';
include_once 'db.php';
session_start();
$nombre = $_POST['name'];
$pass = md5($_POST['pass']);
$mail = $_POST['email'];
$uid = $_POST['uid'];
DB::queryExecuter("UPDATE usuarios SET nombre='$nombre', email='$mail', clave='$pass' WHERE id='$uid'");
header("Location: admin.php");