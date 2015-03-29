<?php
include_once 'lib.php';
View::start("Panel de Admin");
$db = new PDO("sqlite:./datos.db");
$db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
$sql=$db->prepare('SELECT * from usuarios;'); //Existe tabla "usuarios" y "cambiables"
//Ejemplo de lectura de tabla
if($sql){
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_NUM);//hace que se devuelva indices 0,1,2,3 para id,plataforma,nombre,URL
    $all = $sql->fetchAll();
    //Primera fila
    echo "<table><tr>";
    echo "<th>ID</th>";
    echo "<th>usuario</th>";
    //echo "<th>clave</th>";
    echo "<th>nombre</th>";
    echo "<th>email</th>";
    echo "<th>tipo</th>";
    echo "<th>Borrar usuario</th>";
    echo "</tr>";

    foreach($all as $game){
        $id=$game[0];
        echo "<tr id=\"fila$id\">"; //Identificador de fila
        echo "<td>$id</td>";
        $usuario = htmlentities($game[1]);
        echo "<td>$usuario</td>";
        //$clave = htmlentities($game[2]);
        //echo "<td>$clave</td>";
        $nombre = htmlentities($game[3]);
        echo "<td>$nombre</td>";
        $correo = htmlentities($game[4]);
        echo "<td>$correo</td>";
        $tipo = $game[5];
        echo "<td>$tipo</td>";
        //echo "<td><a href=\"{$game[3]}\">$nombre</a></td>";
        if($usuario != 'admin') {
            echo "<td><button onclick=\"deleteGame($id,'$usuario')\">Borrar</button></td>";
        }

        echo "</tr>";
    }
    echo '</table>';
}
View::end();
