<?php
include_once 'lib.php';
include_once 'db.php';
View::start('Panel de administracion');
session_start();
if ( $_SESSION['tipo'] == 0) {
    die("Hacking attempt");
}

echo "Hola <b>".$_SESSION['usuario']."</b><br>";
//echo $_SERVER['HTTP_REFERER'];
$res = DB::queryExecuter('SELECT * FROM usuarios;');
if($res){
    $res->setFetchMode(PDO::FETCH_NAMED);
    $first=true;
    foreach($res as $user){
        if($first){
            echo "<table><tr>";
            foreach($user as $field=>$value){
                echo "<th>$field</th>";
            }
            echo "<th>Gestionar usuario</th>";
            $first = false;
            echo "</tr>";
        }
        echo "<tr>";
        foreach($user as $value){
            echo "<th>$value</th>";
        }
        $uid = $user['id'];
        View::get_form($uid);
        echo "</tr>";
    }
    echo '</table>';
}

View::end();
