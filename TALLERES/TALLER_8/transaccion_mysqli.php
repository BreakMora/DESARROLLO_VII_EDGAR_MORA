<?php
require_once "config_mysqli.php";

function registrarError($mensaje) {
    $fecha = date('Y-m-d H:i:s'); 
    $logMessage = "[$fecha] ERROR: $mensaje" . PHP_EOL; 
    file_put_contents('error_log.txt', $logMessage, FILE_APPEND); 
}

mysqli_begin_transaction($conn);

try {
    // Insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nombre, $email);
    $nombre = "Nuevo Usuario";
    $email = "nuevo@example.com";
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Error en la consulta: " . mysqli_error($conn));
    }
    $usuario_id = mysqli_insert_id($conn);

    // Insertar una publicación para ese usuario
    $sql = "INSERT INTO publicaciones (usuario_id, titulo, contenido) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $usuario_id, $titulo, $contenido);
    $titulo = "Nueva Publicación";
    $contenido = "Contenido de la nueva publicación";
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Error en la consulta: " . mysqli_error($conn));
    }
    
    mysqli_commit($conn);
    echo "Transacción completada con éxito.";
} catch (Exception $e) {
    mysqli_rollback($conn);
    registrarError($e->getMessage());
    echo "Error en la transacción: " . $e->getMessage();
}

mysqli_close($conn);
?>