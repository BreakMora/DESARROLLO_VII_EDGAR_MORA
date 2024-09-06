<?php
    $frases = [
        "Hola mundo",
        "Parcial de Desarrollo 7",
        "Esta es una prueba"
    ];

    $html = '<ul>';
    foreach ($frases as $frase){
        $html .= "<li>".$frase."</li>";
        $html .= "<li>".contar_palabras($frase)."</li>";
        $html .= "<li>".invertir_palabras($frase)."</li>";
    }
    $html = '<ul>';


?>