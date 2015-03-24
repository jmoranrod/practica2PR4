<?php
class Profile {
    public static function get_form(){
        $form = '<form name="profile" action="changeProfile.php" method="post">
                    <fieldset>
                    <legend>Modificar usuario</legend>
                    Nombre:<input type="text" name="nombre" required="yes">
                    Contraseña nueva:<input type="password" name="nombre" required="yes">
                    Correo:<input type="email" name="correo" required="yes">
                    <input type="submit">
                    </fieldset>
                </form>';
        echo $form;
    }
}