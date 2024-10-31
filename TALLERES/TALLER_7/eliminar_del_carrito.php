<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    /*$productos = array_filter($_SESSION['Carrito'], function ($producto) use ($id) {
        return $producto['id'] == $id;
    });
    */
    foreach ($_SESSION['Carrito'] as $key => $producto) {
        if ($producto['id'] == $id) {
            unset($_SESSION['Carrito'][$key]);
            break; 
        }
    }
}

header('Location: ver_carrito.php');
exit;

/*
echo '<pre>';
print_r($_SESSION['Carrito']);
echo '</pre>';
*/
?>