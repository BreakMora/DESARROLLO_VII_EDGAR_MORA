<?php
    include 'funciones_tiendas.php';

    $productos = [
        'camisa' => 50,
        'pantalon' => 70,
        'zapatos' => 80,
        'calcetines' => 10,
        'gorra' => 25];

    $carrito = [
        'camisa' => 2,
        'pantalon' => 1,
        'zapatos' => 1,
        'calcetines' => 3,
        'gorra' => 0
        ];
    
    $total = 0;
    foreach ($carrito as $producto => $cantidad) {
        $total = $total + $cantidad * $productos[$producto];
    }

    echo 'El subtotal de la compra es por: '. $total .' dolares<br>';
    echo 'El descuento total recibido es de: '. calcular_descuento($total) .' dolares<br>';
    echo 'El impuesto total por la compra es de: '. aplicar_impuesto($total) .'  dolares<br>';
    echo 'El total de la compra es por: '. calcular_total($total,calcular_descuento($total),aplicar_impuesto($total)) .' dolares<br>';
?>