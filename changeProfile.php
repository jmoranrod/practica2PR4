<?php
include_once 'lib.php';
include_once 'db.php';
View::start('');
session_start();
$nombre = $_POST['name'];
$pass = md5($_POST['pass']);
$mail = $_POST['email'];
$uid = $_POST['uid'];
$tipo = $_POST['tipo'];

if(empty($nombre) || empty($pass) || empty($mail) || empty($uid)){
    exit();
}else{
    $res = DB::queryExecuter("UPDATE usuarios SET nombre='$nombre', email='$mail', clave='$pass' WHERE usuario='$uid'");
    echo "Datos modificados.";
    header("refresh:5;url=index.php");
}

View::end();