<?php
class DB {
    public static function queryExecuter($query){
        //echo "URL: ".$_SERVER['HTTP_REFERER'];
        $db = new PDO("sqlite:./datos.db");
        $db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
        $res=$db->prepare($query);
        $res->execute();
        return $res;
    }

    //funcion para obtener el token del usuario
}