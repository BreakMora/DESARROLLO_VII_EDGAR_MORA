<?php
// Incluir el archivo de funciones
include 'includes/funciones.php';

// Incluir el encabezado
include 'includes/header.php';

// Obtener la lista de libros
$libros = obtenerLibros();
?>

<main>
    <h2>Lista de Libros</h2>
    <?php
    // Mostrar detalles de cada libro
    foreach ($libros as $libro) {
        echo mostrarDetallesLibro($libro);
    }
    ?>
</main>

<?php
// Incluir el pie de página
include 'includes/footer.php';
?>
