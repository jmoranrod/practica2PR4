<?php

$myuser = stripcslashes($_POST['usuario']);
$pass = md5(stripcslashes($_POST['pass']));
$name = stripcslashes($_POST['nombre']);
$correo = stripcslashes($_POST['correo']);

$db = new PDO("sqlite:datos.db");
$db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión,
$res=$db->prepare("SELECT usuario,email from usuarios;");
$res->execute();
if($res) {
    $res->setFetchMode(PDO::FETCH_NAMED);
    foreach ($res as $user) {
        if ($user['usuario'] == $myuser || $user['email'] == $correo) {

            $error = 'ERROR: El usuario o correo ya existen<br>';
            echo $error;
            if (isset($_SESSION['url'])) {
                $url = $_SESSION['url'];
            } else {
                $url = "index.php";
            }
            break;
        }
    }
    if(!isset($error)){
        $res=$db->prepare("INSERT INTO usuarios ([usuario], [clave], [nombre], [email], [tipo]) VALUES ('$myuser', '$pass', '$name', '$correo', 0);");
        $res->execute();
        session_start();
        if(!isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = $myuser;
            $_SESSION['tipo'] = 0;
        }
        echo "Registrado con nombre de usuario <b>$myuser</b>";
        header("Refresh:5;url=index.php" );
    }

}