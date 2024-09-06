<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARCIAL 1</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<?php

    include "utilidades_texto.php";

    $frases = [
        "Hola mundo",
        "Parcial de Desarrollo 7",
        "Esta es una prueba"
    ];
?>

    <table>
    <?php foreach ($frases as $frase): ?>
        <tr>
           <th style="background-color: gray"> Frase </th>  
            <td><?= $frase ?></td>
        </tr>
        <tr> 
            <th>Letras</th>
            <td><?= contar_palabras($frase) ?></td>
        </tr>
        <tr>
            <th>Vocales</th>
            <td><?= contar_vocales($frase) ?></td>
        </tr>
        <tr>
            <th>Frase Invertida</th>
            <td><?= invertir_palabras($frase) ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>