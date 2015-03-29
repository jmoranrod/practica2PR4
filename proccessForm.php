<?php
include_once 'lib.php';
include_once 'db.php';
include_once 'profile.php';

View::start('');

$uid = $_POST['uid'];
$option = $_POST['option_gestion'];
$tipo = $_POST['tipo'];

if($option == 1){
    $res = DB::queryExecuter("DELETE FROM usuarios WHERE id='$uid';");
    echo "Usuario eliminado<br>Volviendo al panel de control en 5 segundos...";
    header( "refresh:5;url=admin.php" );
}elseif($option == 2){
    Profile::get_form($uid,$tipo);
}else{
    exit();
}

View::end();