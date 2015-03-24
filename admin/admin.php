<?php

session_start();
if ( $_SESSION['tipo'] == 0) {
    die("Hacking attempt");
}

echo "Hola <b>".$_SESSION['usuario']."</b>";

