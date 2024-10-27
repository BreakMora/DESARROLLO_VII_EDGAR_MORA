<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: Iniciar_Sesion.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Usuario</title>

    </head>

    <section>
        <a href="Backend/Logout.php">Cerrar Sesión</a>
        <a href="Agregar_Tarea.php">Agregar Tarea</a>
    </section>
    
    <body>
        <h2>
            Bienvenido, <?php echo htmlspecialchars_decode($_SESSION['usuario']); ?>
        </h2>
        
        <p>
            Tienes Tareas Pendientes.
        </p>

        <?php

            $jsonData = file_get_contents('Backend/Data.json');
            $data = json_decode($jsonData, true);
            $usuarios = $data['usuarios'];
            $tareas = $data['tareas'];

        ?>

        <table>

            <caption>Tareas Pendientes</caption>

            <thead>
                <th>
                    ID
                </th>
                <th>
                    Titulo
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Prioridad
                </th>
                <th>
                    Fecha de Creación
                </th>
                <th>
                    Tipo
                </th>
            </thead>

            <tbody>
                <?php foreach($tareas as $tarea): ?>
                    <?php if ($tarea['userid'] == $_SESSION['userid']): ?>
                        <tr>
                            <td> <?php echo $tarea['id'] ?> </td>
                            <td> <?php echo $tarea['titulo'] ?> </td>
                            <td> <?php echo $tarea['descripcion'] ?>  </td>
                            <td> <?php echo $tarea['prioridad'] ?>  </td>
                            <td> <?php echo $tarea['fecha'] ?>  </td>
                            <td> <?php echo $tarea['tipo'] ?>  </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>    
            </tbody>

        </table>

    </body>

</html>