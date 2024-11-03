<?php
    require_once "config_mysqli.php";

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = intval($_POST['id']);
        
        $sql = "DELETE FROM usuarios WHERE id = ? ";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                echo "Usuario eliminado con exito.";
            } else {
                echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn);
            }
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div>
        <label>ID del Usuario</label>
        <input type="number" name="id" require>
    </div>
    <input type="submit" value="Eliminar Usuario">

</form>