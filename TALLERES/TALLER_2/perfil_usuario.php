<?php

    $nombre_completo = "Edgar Mora";
    $edad = 25;
    $correo = "edgar.mora1@utp.ac.pa";
    $telefono = "6271-3974";

    define("OCUPACION","Estudiante");

    $mensaje1 = "Hola mi nombres es ".$nombre_completo." y tengo $edad años";
    $mensaje2 = "Actualmente soy ". OCUPACION . " de la UTP.";

    echo $mensaje1."<br>";
    print $mensaje2."<br>";
    printf("Mi correo electronico es %s y mi telefono es %s <br>", $correo, $telefono);

    print "<br>Información de debugging:<br>";
    var_dump($nombre_completo);
    echo "<br>";
    var_dump($edad);
    echo "<br>";
    var_dump($correo);
    echo "<br>";
    var_dump($telefono);


?>