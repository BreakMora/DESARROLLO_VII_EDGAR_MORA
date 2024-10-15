<?php
session_start();

$archivoRegistros = 'registros.json';
if (file_exists($archivoRegistros)) {
    $registros = json_decode(file_get_contents($archivoRegistros), true);
} else {
    $registros = [];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Registros</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Resumen de Registros Procesados</h1>
    <?php if (empty($registros)): ?>
        <p>No hay registros disponibles.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Sitio Web</th>
                <th>Género</th>
                <th>Intereses</th>
                <th>Comentarios</th>
                <th>Foto de Perfil</th>
            </tr>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?= htmlspecialchars($registro['nombre']) ?></td>
                    <td><?= htmlspecialchars($registro['email']) ?></td>
                    <td><?= htmlspecialchars($registro['edad']) ?></td>
                    <td><?= htmlspecialchars($registro['sitio_web']) ?></td>
                    <td><?= htmlspecialchars($registro['genero']) ?></td>
                    <td><?= htmlspecialchars(implode(", ", $registro['intereses'])) ?></td>
                    <td><?= htmlspecialchars($registro['comentarios']) ?></td>
                    <td>
                        <?php if (isset($registro['foto_perfil'])): ?>
                            <img src="<?= htmlspecialchars($registro['foto_perfil']) ?>" width="100">
                        <?php else: ?>
                            Sin foto
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <br>
    <a href="formulario.html">Volver al formulario</a>
</body>
</html>