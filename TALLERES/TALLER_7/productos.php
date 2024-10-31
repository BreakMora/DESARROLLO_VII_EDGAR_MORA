<?php

    $jsonData = file_get_contents('Productos.json');
    $data = json_decode($jsonData, true);
    $Productos = $data['productos'];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<section>
    <a href="ver_carrito.php">Ver Carrito</a>
</section>

<body>
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
            Precio
        </th>
        <th>
            Acciones
        </th>

        <tbody>
            <?php foreach ($Productos as $Producto): ?>
                <tr>
                    <td> <?php echo $Producto['id']; ?> </td>
                    <td> <?php echo $Producto['producto']; ?> </td>
                    <td> <?php echo $Producto['descripcion']; ?> </td>
                    <td> <?php echo $Producto['precio']; ?> </td>
                    <td>
                        <form method="POST" action="agregar_al_carrito.php">
                            <input type="hidden" name="id" value="<?php echo $Producto['id'] ?>">
                            <input type="hidden" name="producto" value="<?php echo $Producto['producto'] ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $Producto['descripcion'] ?>">
                            <input type="hidden" name="precio" value="<?php echo $Producto['precio'] ?>">
                            <button type="submit">Agregar al Carrito</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>