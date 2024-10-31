<?php

    session_start();

    if (!isset($_SESSION['Carrito'])){
        $_SESSION['Carrito'] = [];
    }

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $Producto = [
            'id' => $_POST['id'],
            'producto' => $_POST['producto'],
            'descripcion' => $_POST['descripcion'],
            'precio' => $_POST['precio']
        ];
    
        $_SESSION['Carrito'][] = $Producto;
        header('Location: productos.php');
        exit;
    }

?>