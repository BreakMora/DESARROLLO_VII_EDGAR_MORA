<?php

$calificacion = 75;

if ($calificacion >= 90) {
    $letra = "A";
} elseif ($calificacion >= 80) {
    $letra = "B";
} elseif ($calificacion >= 70) {
    $letra = "C";
} elseif ($calificacion >= 60) {
    $letra = "D";
} else {
    $letra = "F";
}
echo "<br>";

print "Tu calificación es $letra <br>";

echo ($letra == "A" || $letra == "B" || $letra == "C" || $letra == "D") ? "Aprobado" : "Reprobado";

echo "<br>";

switch ($letra) {
    case "A":
        echo "Excelente trabajo. <br>";
    case "B":
        echo "Buen trabajo.<br>";
    case "C":
        echo "Trabajo aceptable.<br>";
        break;
    case "D":
        echo "Necesitas mejorar.<br>";
        break;
    default:
        echo "Debes esforzarte más.<br>";
}
?>