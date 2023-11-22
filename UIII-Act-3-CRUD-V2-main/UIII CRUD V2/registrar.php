<?php
    //print_r($_POST);
    if (empty($_POST["oculto"]) || empty($_POST["Origen"]) || empty($_POST["Destino"]) || empty($_POST ["Distancia"]) || empty($_POST["Duracion_viaje"]) || empty($_POST["Atracc_cercanas"]) || empty($_POST["Servicios_y_comodidad"]) || empty($_POST["Dificultad_camino"])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'conexion.php';
    $Origen = $_POST["Origen"];
    $Destino = $_POST["Destino"];
    $Distancia = $_POST["Distancia"];
    $Duracion_viaje = $_POST["Duracion_viaje"];
    $Atracc_cercanas = $_POST["Atracc_cercanas"];
    $Servicios_y_comodidad = $_POST["Servicios_y_comodidad"];
    $Dificultad_camino = $_POST["Dificultad_camino"];
    
    $sentencia = $bd->prepare("INSERT INTO rutas(Origen, Destino, Distancia, Duracion_viaje, Atracc_cercanas, Servicios_y_comodidad, Dificultad_camino) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$Origen, $Destino, $Distancia, $Duracion_viaje, $Atracc_cercanas, $Servicios_y_comodidad, $Dificultad_camino]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
