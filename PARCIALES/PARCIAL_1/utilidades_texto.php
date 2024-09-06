<?php
    function contar_palabras($texto){
        $num_letras = strlen($texto);
        return $num_letras;
    }

    function contar_vocales($texto){
        $vocales = ['a','e','i','o','u'];
        $contador = "en progreso";
        /*$caracteres = str_split($texto);
        foreach ($caracteres as $caracter) {
            if (in_array($caracter, $vocales)) {
                $contador++;
            }
        }*/
        return $contador;
    }

    function invertir_palabras($texto){
        $invertir = strrev($texto);
        return $invertir;
    }

?>