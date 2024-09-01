<?php
    function convert_Json_to_Array($file_json){
        $file_json = file_get_contents($file_json);
        $file_array = json_decode($file_json, true);
        return $file_array;
    }

    function sort_Array_Alphabetically($array){
        usort($array, function($a, $b){
            return strcmp($a['nombre'], $b['nombre']);
        });
        return $array;
    }

    function show_array($array){
        $count = 1;
        foreach ($array as $column) {
            echo "Producto".$count."<br>";
            echo "Nombre: ".$column['nombre']."<br>";
            echo "Precio: ".$column['precio']."<br>";
            echo "Cantidad: ".$column['cantidad']."<br>";
            echo "Total Productos: ".$column['total Producto']."<br>";
            echo "<br>";
            $count++;
        }
    }

    function calculate_Array($array){
        $newcolumn = array_map(function($array){
            $array['total Producto'] = $array['precio'] * $array['cantidad'];
            return $array;
        }, $array);
        return $newcolumn;
    }

    function calculate_Total_Array($array){
        $array = array_sum(array_column($array, 'total Producto'));
        return $array;
    }

    function low_Stock($array){
        $item = array_column($array, 'cantidad');
        $low_amount = min($item);
        $low_item_index = array_search($low_amount, $item);
        return $array[$low_item_index]['nombre'];
    }

    // Script principal
    $inventario = convert_Json_to_Array('inventario.json');
    $inventario = sort_Array_Alphabetically($inventario);
    $inventario = calculate_Array($inventario);
    echo "Listado de Productos<br><br>";
    echo show_array($inventario);
    echo "Total de Inventario: ".calculate_Total_Array($inventario)."<br>";
    echo "El producto con mas bajo inventario: ".low_Stock($inventario);
?>

