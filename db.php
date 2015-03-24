<?php
class DB {
    public static function queryExecuter($query){
        $db = new PDO("sqlite:datos.db");
        $db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
        $res=$db->prepare($query);
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
    }

    public static function login($myuser,$md5pass,$query){
        $db = new PDO("sqlite:datos.db");
        $db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
        $res=$db->prepare($query);
        $res->execute();
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
    }
}