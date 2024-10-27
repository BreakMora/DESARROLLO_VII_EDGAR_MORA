<?php
    session_start();

    $jsonData = file_get_contents('Data.json');
    $data = json_decode($jsonData, true);
    $usuarios = $data['usuarios'];

    if (isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $user_S = trim($_POST['nombre_usuario']);
        $pass_S = trim($_POST['contra_usuario']);
        $user_encontrado = false;
        
        foreach ($usuarios as $usuario){
            $user = $usuario['user'];
            $pass = $usuario['contrasena'];
            $id = $usuario['id'];
            if($user_S === $user){
                if ($pass === $pass_S) {
                    $_SESSION['usuario'] = $user; 
                    $_SESSION['contrasena'] = $pass;
                    $_SESSION['userid'] = $id;
                    header("Location: ../index.php");
                    exit;
                }
            } else {
                exit;
            }

        }
    }

?>
