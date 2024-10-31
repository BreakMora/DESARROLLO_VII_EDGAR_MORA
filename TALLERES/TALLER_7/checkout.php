<?php

    session_start();
    include 'carrito_funciones.php';
    
    if (!isset($_SESSION['Carrito']) || empty($_SESSION['Carrito'])) {
        echo "No ah ingresado productos al carrito";
    } else {
        $resultados = procesarCarrito($_SESSION['Carrito']);
        $Carrito = $resultados['Carrito'];
        $total_compra = $resultados['total_compra'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Transacción</title>
</head>

<section>
    <a href="ver_carrito.php">Volver</a>
</section>

<body>
    <?php if (isset($_SESSION['Carrito']) && !empty($_SESSION['Carrito'])): ?>

        <h2>Revisar pedido</h2>

        <table>
            
            <?php foreach ($Carrito as $Producto): ?>
                <tr>
                    <td> Producto </td>
                    <td> <?php echo $Producto['producto']; ?> </td>
                </tr>
                <tr>
                    <td> Descripcion </td>
                    <td> <?php echo $Producto['descripcion']; ?> </td>

                </tr>
                <tr>
                    <td> Precio x Und </td>
                    <td> <?php echo $Producto['precio']; ?> </td>
                </tr>
                <tr>
                    <td> Cantidad </td> 
                    <td> <?php echo $Producto['cantidad']; ?> </td>
                </tr>
                <tr>
                    <td colspan="2"><br></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td> <h4> Total de compra: </h4> </td>
                <td> <?php echo $total_compra; ?> </td>
            </tr>
            <tr>
                <td>
                    <form method="POST" action="compra_realizada.php">
                        <button type="submit">Pagar</button>
                    </form>
                </td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>