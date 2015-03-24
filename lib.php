<?php
class View{
    public static function  start($title){
        $html = "<!DOCTYPE html>
        <html>
        <head>
        <meta charset=\"utf-8\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"css/animate-custom.css\" />
        <title>$title</title>
        </head>
        <body>";
        echo $html;
    }
    public static function end(){
        echo '</body>
        </html>';
    }

    public static function search_box(){
        $html = "        <form method=\"post\" action=\"search.php\">
        <fieldset>
        <legend>Búsqueda</legend>
        <input type=\"text\" name=\"buscar\">
        <select name=\"buscador\">
        <option value=\"1\" selected=\"selected\">Juegos</option>
        <option value=\"2\">Plataforma</option>
        <option value=\"3\">Usuarios</option>
        </select>
        <input type=\"submit\" name=\"submit2\">
        </fieldset>
        </form>";
        echo $html;
    }

    public static function regForm(){
        $form = '<form class="registro" method=post action="checkregister.php">
        <fieldset>
        <legend>Registro</legend>
        Usuario: <input type="text" name="usuario" required="yes"><br>
        Contraseña: <input type="text" name="pass" required="yes"><br>
        Nombre: <input type="text" name="nombre" required="yes"><br>
        Correo: <input type="email" name="correo" required="yes"><br><br>
        <input type="submit">
        <input type="reset">
        </fieldset>';
        echo $form;
    }
}
