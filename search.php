<?php

$text = $_POST['buscar'];
$option = $_POST['buscador'];

if(empty($text) || empty($option)){
   die('No arguments to search');
}

if($option == 1){
    $tabla = 'juegos';
    $campo = 'nombre';
    $sel = '*';
}elseif($option == 2){
    $tabla = 'juegos';
    $campo = 'plataforma';
    $sel = '*';
}elseif($option == 3){
    $tabla = 'usuarios';
    $campo = 'usuario';
    $sel = 'usuario,nombre';
}else{
    die('Nope');
}

$db = new PDO("sqlite:datos.db");
$db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
$res=$db->prepare("SELECT $sel FROM $tabla WHERE $campo='$text';");
$res->execute();
if($res){
    $res->setFetchMode(PDO::FETCH_NAMED);
    $first=true;
    foreach($res as $game){
        if($first){
            echo "<table><tr>";
            foreach($game as $field=>$value){
                echo "<th>$field</th>";
            }
            $first = false;
            echo "</tr>";
        }
        echo "<tr>";
        foreach($game as $value){
            echo "<th>$value</th>";
        }
        echo "</tr>";
    }
    echo '</table>';
}