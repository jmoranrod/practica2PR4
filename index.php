<?php
include_once 'lib.php';
include_once 'db.php';
include_once 'profile.php';
View::start('Club de intercambio de vídeo juegos');
$res = DB::queryExecuter('SELECT * FROM usuarios;');
//print_r($res);
echo "<br>";
//DB::queryExecuter('SELECT * FROM usuarios;');
echo "<br>";
echo '<img class="minilogo" src="logo.gif">';
session_start();
View::search_box();
if(!isset($_SESSION['usuario'])){
    //View::search_box();
    echo '<form method=post action="login.php">
        <fieldset>
            <legend>Iniciar sesión</legend>
            User: <input type="text" name="user"><br>
            Password: <input type="password" name="pass"><br>
            <input type="submit" name="submit" value="Submit"><br>
        </fieldset>
        </form>
        <a href="register.php">Registrarse</a>';
}else{
    echo "Bienvenido/a: <p><b>".$_SESSION['usuario']."</b></p><br>";
    if(isset($_SESSION['tipo'])){
        if($_SESSION['tipo'] == 1){
            echo '<a href="admin.php">Administración</a><br>';
        }
    }
    echo '<a href="logout.php">Cerrar sesión</a><br>';
    Profile::get_form($_SESSION['usuario'], $_SESSION['tipo']);
}

//Ejemplo de lectura de tabla
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
//echo print_r(get_defined_vars());
View::end();
