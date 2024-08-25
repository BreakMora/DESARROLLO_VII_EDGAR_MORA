<?php
    $nombre = "Edgar";
    $edad = 25;
    
    $presentacion = "Hola, mi nombre es ". $nombre . " y tengo " . $edad . " años.";
    $presentacion2 = "Hola, mi nombre es $nombre y tengo $edad años";

    define("SALUDO", "¡Bienvenido!");
    $mensaje = SALUDO . " " . $nombre;

    echo $presentacion . "<br>";
    echo $presentacion2 . "<br>";
    echo $mensaje ."<br>";
?>