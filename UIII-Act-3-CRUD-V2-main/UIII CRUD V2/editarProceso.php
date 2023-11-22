<?php
    print_r($_POST);
    if (!isset($_POST['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $id = $_POST['id'];
    $Origen = $_POST['Origen'];
    $Destino = $_POST['Destino'];
    $Distancia = $_POST['Distancia'];
    $Duracion_viaje = $_POST['Duracion_viaje']; // Corregido el nombre de la variable
    $Atracc_cercanas = $_POST['Atracc_cercanas'];
    $Servicios_y_comodidad = $_POST['Servicios_y_comodidad'];
    $Dificultad_camino = $_POST['Dificultad_camino'];

    $sentencia = $bd->prepare("UPDATE rutas SET Origen = ?, Destino = ?, Distancia = ?, Duracion_viaje = ?, Atracc_cercanas = ?, Servicios_y_comodidad = ?, Dificultad_camino = ? WHERE id = ?;");
    $resultado = $sentencia->execute([$Origen, $Destino, $Distancia, $Duracion_viaje, $Atracc_cercanas, $Servicios_y_comodidad, $Dificultad_camino, $id]);
    
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
