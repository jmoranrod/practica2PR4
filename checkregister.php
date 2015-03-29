<?php
include_once 'lib.php';
include_once 'db.php';
View::start('');
$myuser = stripcslashes($_POST['usuario']);
$pass = md5(stripcslashes($_POST['pass']));
$name = stripcslashes($_POST['nombre']);
$correo = stripcslashes($_POST['correo']);

if(empty($myuser) || empty($pass) || empty($name) || empty($correo)){
   echo "Debes rellenar todos los campos";
    header("refresh:5;url=index.php");
}else{
    $res = DB::queryExecuter('SELECT usuario,email from usuarios;');

    if($res) {
        $res->setFetchMode(PDO::FETCH_NAMED);
        foreach ($res as $user) {
            if ($user['usuario'] == $myuser || $user['email'] == $correo) {

                $error = 'ERROR: El usuario o correo ya existen<br>';
                echo $error.'<a href="index.php">Volver atrás</a>';

                break;
            }
        }
        if(!isset($error)){
            DB::queryExecuter("INSERT INTO usuarios ([usuario], [clave], [nombre], [email], [tipo]) VALUES ('$myuser', '$pass', '$name', '$correo', 0);");
            session_start();
            if(!isset($_SESSION['usuario'])){
                $_SESSION['usuario'] = $myuser;
                $_SESSION['tipo'] = 0;
            }
            echo "Registrado con nombre de usuario <b>$myuser</b>";
            header("Refresh:5;url=index.php" );
        }
    }
}

View::end();
