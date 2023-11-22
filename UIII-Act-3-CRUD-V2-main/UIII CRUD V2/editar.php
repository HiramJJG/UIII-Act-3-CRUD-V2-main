<?php include 'header.php'; ?>

<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM rutas WHERE id = ?;");
    $sentencia->execute([$id]);
    $rutas = $sentencia->fetch(PDO::FETCH_OBJ);
    // print_r($rutas);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos del rutas:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Origen: </label>
                        <input type="text" class="form-control" name="Origen" required 
                            value="<?php echo $rutas->Origen; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Destino: </label>
                        <input type="text" class="form-control" name="Destino" required
                            value="<?php echo $rutas->Destino; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Distancia: </label>
                        <input type="number" class="form-control" name="Distancia" required
                            value="<?php echo $rutas->Distancia; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Duracion del viaje: </label>
                        <input type="number" class="form-control" name="Duracion_viaje" required
                        value="<?php echo $rutas->Duracion_viaje; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Atracciones cercanas: </label>
                        <input type="text" class="form-control" name="Atracc_cercanas" required
                            value="<?php echo $rutas->Atracc_cercanas; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Servicios y comodidad: </label>
                        <input type="text" class="form-control" name="Servicios_y_comodidad" required
                            value="<?php echo $rutas->Servicios_y_comodidad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dificultad de camino: </label>
                        <input type="text" class="form-control" name="Dificultad_camino" required
                            value="<?php echo $rutas->Dificultad_camino; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $rutas->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
