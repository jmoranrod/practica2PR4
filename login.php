<?php
include_once 'lib.php';
include_once 'db.php';

$myuser = $_POST['user'];
$mypass = $_POST['pass'];
$md5pass = md5($mypass);

DB::login($myuser,$md5pass,"SELECT usuario,clave,tipo FROM usuarios WHERE usuario='$myuser';");