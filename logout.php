<?php
include_once 'lib.php';
View::start('Club de intercambio de videojuegos');
session_start();
session_destroy();

echo 'Desconectado. <a href="index.php">Volver atrás</a>';

View::end();