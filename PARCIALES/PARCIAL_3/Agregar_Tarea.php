<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Una Tarea</title>
</head>
<body>

    <h2> Agregar una nueva tarea </h2>

    <form action="Backend/Add.php" method="post">
        <table>
            <tr>
                <td>
                    Titulo
                </td>
                <td>
                    <label for="titulo"></label>
                    <input type="text" name="titulo" id="titulo">
                </td>
            </tr>
            <tr>
                <td>
                    Descripcion:
                </td>
                <td>
                    <label for="descripcion"></label>
                    <input type="text" name="descripcion" id="descripcion">
                </td>
            </tr>
            <tr>
                <td>
                    Fecha
                </td>
                <td>
                    <label for="fecha"></label>
                    <input type="date" name="fecha" id="fecha">
                </td>
            </tr>
            <tr>
                <td>
                    Prioridad
                </td>
                <td>
                    <label for="prioridad"></label>
                    <input type="number" name="prioridad" id="prioridad">
                </td>
            </tr>
            <tr>
                <td>
                    Tipo
                </td>
                <td>
                    <label for="tipo"></label>
                    <input type="Text" name="tipo" id="tipo">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="Agregar" id="Agregar" value="Agregar">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>