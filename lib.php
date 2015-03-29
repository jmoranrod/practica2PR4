<?php
class View{
    public static function  start($title){
        $html = "<!DOCTYPE html>
        <html>
        <head>
        <meta charset=\"utf-8\">
        <link rel=\"stylesheet\" type=\"text/css\" href='estilos.css' />
        <script src='http://code.jquery.com/jquery-1.11.2.min.js'></script>
        <script src='scripts.js'></script>
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
        $html = "        <form method=\"post\" action=\"search.php\" name=\"search\" onsubmit='return validateForm()'>
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

    public static function get_form($uid,$tipo){
        echo "<th>
            <form name='gestion' method='post' action='proccessForm.php'>
                <select name='option_gestion'>
                    <option value='1' selected>Borrar usuario</option>
                    <option value='2' disabled>Modificar usuario</option>
                </select>
                    <input type='hidden' value='$uid' name='uid'>
                    <input type='hidden' value='$tipo' name='tipo'>
                    <input type='submit'>
            </form>
        </th>";
    }
}
