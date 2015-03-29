<?php
class Profile {
    public static function get_form($uid,$tipo){
        $form = "<form name='profile' action='changeProfile.php' method='post'>
                    <fieldset>
                    <legend>Modificar perfil</legend>
                    Nombre:<input type='text' name='name' required='yes'>
                    Contraseña nueva:<input type='password' name='pass' required='yes'>
                    Correo:<input type='email' name='email' required='yes'>
                    <input type='hidden' value='$uid' name='uid'>
                    <input type='hidden' value='$tipo' name='tipo'>
                    <input type='submit'>
                    </fieldset>
                </form>";
        echo $form;
    }
}