<?php
// 1. Crear un arreglo de 10 nombres de ciudades
$ciudades = ["Nueva York", "Tokio", "Londres", "París", "Sidney", "Río de Janeiro", "Moscú", "Berlín", "Ciudad del Cabo", "Toronto"];

// 2. Imprimir el arreglo original
echo "Ciudades originales:\n";
print_r($ciudades);

// 3. Agregar 2 ciudades más al final del arreglo
array_push($ciudades, "Dubái", "Singapur");

// 4. Eliminar la tercera ciudad del arreglo
array_splice($ciudades, 2, 1);

// 5. Insertar una nueva ciudad en la quinta posición
array_splice($ciudades, 4, 0, "Mumbai");
echo "<br>";

// 6. Imprimir el arreglo modificado
echo "\nCiudades modificadas:\n";
print_r($ciudades);
echo "<br>";

// 7. Crear una función que imprima las ciudades en orden alfabético
function imprimirCiudadesOrdenadas($arr) {
    $ordenado = $arr;
    sort($ordenado);
    echo "Ciudades en orden alfabetico:\n";
    foreach ($ordenado as $ciudad) {
        echo "- $ciudad\n";
    }
}

function contarCiudadesPorInicial($ciudades, $inicial) {
    $contador = 1;
    echo "Ciudades con inicial :" . $inicial."<br>";
    foreach ($ciudades as $ciudad) {
        $letra = str_split($ciudad);
        if ($inicial == $letra[0]){
            echo $contador.".".$ciudad."<br>";
            $contador++;
        }
    }
}

// 8. Llamar a la función
imprimirCiudadesOrdenadas($ciudades);
echo "<br>";
contarCiudadesPorInicial($ciudades, 'S')

// TAREA: Crea una función que cuente y retorne el número de ciudades que comienzan con una letra específica
// Ejemplo de uso: contarCiudadesPorInicial($ciudades, 'S') debería retornar 1 (Singapur)
// Tu código aquí

?>