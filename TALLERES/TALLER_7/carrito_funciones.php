<?php
// carrito_funciones.php

function procesarCarrito($sessionCarrito) {
    $Carrito = [];

    foreach ($sessionCarrito as $Producto) {
        if (isset($Producto['id'])) {
            $id = $Producto['id'];

            if (!isset($Carrito[$id])) {
                $Carrito[$id] = [
                    'id' => $Producto['id'],
                    'producto' => $Producto['producto'],
                    'descripcion' => $Producto['descripcion'],
                    'precio' => $Producto['precio'],
                    'cantidad' => 1,
                    'total' => $Producto['precio']
                ];
            } else {
                $Carrito[$id]['cantidad'] += 1;
                $Carrito[$id]['total'] = $Carrito[$id]['cantidad'] * $Producto['precio'];
            }
        }
    }

    // Calcular el total de la compra
    $total_compra = array_sum(array_map(function($producto) {
        return $producto['total'];
    }, $Carrito));

    return ['Carrito' => $Carrito, 'total_compra' => $total_compra];
}
?>