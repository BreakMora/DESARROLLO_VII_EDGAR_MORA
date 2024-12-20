<?php
    require_once "config_pdo.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = intval($_POST['id']);

        $sql = "DELETE FROM usuarios WHERE id = :id";

        if ($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()){
                echo "Usuario eliminado con exito";
            } else {
                echo "ERROR: No se pudo ejecutar la consulta. " . $stmt->errorinfo()[2];
            }
        }

        unset($stmt);
    }

    unset($pdo);

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div>
        <label>ID del Usuario</label>
        <input type="number" name="id" require>
    </div>
    <input type="submit" value="Eliminar Usuario">

</form>