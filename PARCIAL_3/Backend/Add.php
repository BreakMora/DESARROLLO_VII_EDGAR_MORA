<?php

    session_start();

    if(!isset($_SESSION['usuario'])) {
        header("Location: ../Iniciar_Sesion.php");
        exit;
    }

    $jsonData = file_get_contents('Data.json');
    $data = json_decode($jsonData, true);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $datos = ['titulo', 'descripcion','prioridad','fecha','tipo'];
        foreach ($datos as $dato){ 
                $valor = $_POST[$dato];
                $nuevaTarea[$dato] = $valor;
            }
        $nuevaTarea['id'] = end($data['tareas'])['id']+1;
        
        $nuevaTarea['userid'] = $_SESSION['userid'];

        $data['tareas'][] = $nuevaTarea;

        file_put_contents('data.json', json_encode($data,JSON_PRETTY_PRINT));

        header("Location: ../index.php");
        exit;
    }
?>