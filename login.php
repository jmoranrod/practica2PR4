<?php
include_once 'lib.php';
include_once 'db.php';

$myuser = $_POST['user'];
$mypass = $_POST['pass'];
$md5pass = md5($mypass);

$res = DB::queryExecuter("SELECT usuario,clave,tipo FROM usuarios WHERE usuario='$myuser';");

if($res){
    $res->setFetchMode(PDO::FETCH_NAMED);
    foreach($res as $user){
        if($user['usuario']==$myuser && $user['clave']==$md5pass){
            session_start();
            $_SESSION['usuario']=$myuser;
            $_SESSION['tipo']=$user['tipo'];
            //echo $_SESSION['tipo'];
            if(isset($_SESSION['url'])){
                $url = $_SESSION['url'];
            }else{
                $url = "index.php";
            }
            header("Location: $url");
        }else{
            //echo 'Wrong username or pass!';
            header("Location: index.php");
        }
    }
    header("Location: index.php");
}