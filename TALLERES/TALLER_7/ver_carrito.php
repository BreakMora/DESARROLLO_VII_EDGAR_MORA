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
    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    /*
    echo '<pre>';
    print_r($Carrito);
    echo '</pre>';
    */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carro de Compras</title>
</head>

<section>
    <a href="cerrar_sesion.php">Cerrar Sesion</a>
    <a href="productos.php">Volver</a>
    <a href="checkout.php">Finalizar Pedido</a>
</section>

<body>
    <?php if (isset($_SESSION['Carrito']) && !empty($_SESSION['Carrito'])): ?>
        <table>
            <th>
                ID
            </th>
            <th>
                Producto    
            </th>
            <th>
                Descripcion
            </th>
            <th>
                Precio x Und
            </th>
            <th>
                Cantidad
            </th>
            <th>
                Total
            </th>
            <th>
                Acciones
            </th>

            <tbody>
                <?php foreach ($Carrito as $Producto): ?>
                    <tr>
                        <td> <?php echo $Producto['id']; ?> </td>
                        <td> <?php echo $Producto['producto']; ?> </td>
                        <td> <?php echo $Producto['descripcion']; ?> </td>
                        <td> <?php echo $Producto['precio']; ?> </td>
                        <td> <?php echo $Producto['cantidad']; ?> </td>
                        <td> <?php echo $Producto['total']; ?> </td>

                        <td>
                            <form method="POST" action="eliminar_del_carrito.php">
                                <input type="hidden" name="id" value="<?php echo $Producto['id']; ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <td> <h4> Total de compra: </h4> </td>
                <td> <?php echo $total_compra; ?> </td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>