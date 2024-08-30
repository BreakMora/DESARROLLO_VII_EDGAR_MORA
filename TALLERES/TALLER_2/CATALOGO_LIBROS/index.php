<?php
include 'includes/funciones.php';
include 'includes/header.php';

$libros = obtenerLibros();
?>

<main>
    <h2>Lista de Libros</h2>
    <?php
    foreach ($libros as $libro) {
        echo mostrarDetallesLibro($libro);
    }
    ?>
</main>

<?php
include 'includes/footer.php';
?>
