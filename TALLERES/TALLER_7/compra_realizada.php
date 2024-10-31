<?php
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaccion Completadaas</title>
</head>
<body>
    <h3>
        Compra realizada con exito!!
    </h3>
    <section>
        <a href="productos.php">Ver otros productos</a>
    </section>
</body>
</html>