<?php
require_once "config_mysqli.php";

// 1. Mostrar todos los usuarios junto con el número de publicaciones que han hecho
$sql = "SELECT u.id, u.nombre, COUNT(p.id) as num_publicaciones 
        FROM usuarios u 
        LEFT JOIN publicaciones p ON u.id = p.usuario_id 
        GROUP BY u.id";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Usuarios y número de publicaciones:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Usuario: " . $row['nombre'] . ", Publicaciones: " . $row['num_publicaciones'] . "<br>";
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

// 2. Listar todas las publicaciones con el nombre del autor
$sql = "SELECT p.titulo, u.nombre as autor, p.fecha_publicacion 
        FROM publicaciones p 
        INNER JOIN usuarios u ON p.usuario_id = u.id 
        ORDER BY p.fecha_publicacion DESC";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Publicaciones con nombre del autor:</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Título: " . $row['titulo'] . ", Autor: " . $row['autor'] . ", Fecha: " . $row['fecha_publicacion'] . "<br>";
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

// 3. Encontrar el usuario con más publicaciones
$sql = "SELECT u.nombre, COUNT(p.id) as num_publicaciones 
        FROM usuarios u 
        LEFT JOIN publicaciones p ON u.id = p.usuario_id 
        GROUP BY u.id 
        ORDER BY num_publicaciones DESC 
        LIMIT 1";

$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo "<h3>Usuario con más publicaciones:</h3>";
    echo "Nombre: " . $row['nombre'] . ", Número de publicaciones: " . $row['num_publicaciones'];
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

// 4. Listar los usuarios que no han realizado ninguna publicación.

$sql = "SELECT u.nombre
        FROM usuarios u
        LEFT JOIN publicaciones p ON u.id = p.usuario_id
        WHERE p.id IS NULL";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Usuarios que no ha realizado ninguna publicacion</h3>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "Nombre: " . $row['nombre'];
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

// 5. Calcular el promedio de publicaciones por usuario.

$sql = "SELECT u.id, COUNT(p.id) as num_publicaciones, 
        ROUND(AVG(COUNT(p.id)) OVER(), 0) as promedio_por_usuario
        FROM usuarios u
        LEFT JOIN publicaciones p ON u.id = p.usuario_id
        GROUP BY u.id";

$result = mysqli_query($conn, $sql);

if ($result) {  
    $row = mysqli_fetch_assoc($result);
    echo "<h3>Promedio de publicaciones por usuario</h3>";
    echo "El promedio de publicaciones por usuario es de " . $row['promedio_por_usuario'];
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}

// 6. Encontrar la publicación más reciente de cada usuario.

$sql = "SELECT u.nombre, p.fecha_publicacion, p.titulo
        FROM usuarios u
        JOIN publicaciones p ON p.usuario_id = u.id
        JOIN (SELECT usuario_id, MAX(fecha_publicacion) AS fecha_reciente
                FROM publicaciones
                GROUP BY usuario_id
        ) AS ultima ON p.usuario_id = ultima.usuario_id AND p.fecha_publicacion = ultima.fecha_reciente";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<h3>Publicaciones mas reciente de cada usuario</h3>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "Usuario: " . $row['nombre'] . ", Publicacion: " . $row['titulo'] . ", Fecha de publicacion: " . $row['fecha_publicacion'] . "<br>";
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>