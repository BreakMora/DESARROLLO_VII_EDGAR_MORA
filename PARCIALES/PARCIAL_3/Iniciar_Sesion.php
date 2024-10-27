<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    
    <h2>Iniciar Sesion</h2>

    <form action="Backend/Login.php" method="post">
        <table>
            <tr>
                <td>
                    Usuario:
                </td>
                <td>
                    <label for="nombre_usuario"></label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario">
                </td>
            </tr>
            <tr>
                <td>
                    Contrasena:
                </td>
                <td>
                    <label for="contrasena"></label>
                    <input type="password" name="contra_usuario" id="contra_usuario">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="iniciar_sesion" id="iniciar_sesion" value="IniciarSesion">
                </td>
            </tr>
        </table>
        
    </form>
</body>
</html>