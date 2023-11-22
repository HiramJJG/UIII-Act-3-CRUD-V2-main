<?php include 'header.php' ?>

<?php
    include_once "conexion.php";
    $sentencia = $bd->query("SELECT * FROM rutas");
    $rutas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    // print_r($rutas);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de rutas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Distancia</th>
                                <th scope="col">Duracion del viaje</th>
                                <th scope="col">Atracciones cercanas</th>
                                <th scope="col">Servicios y comodidad</th>
                                <th scope="col">Dificultad de camino</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($rutas as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->Origen; ?></td>
                                <td><?php echo $dato->Destino; ?></td>
                                <td><?php echo $dato->Distancia; ?></td>
                                <td><?php echo $dato->Duracion_viaje; ?></td>
                                <td><?php echo $dato->Atracc_cercanas; ?></td>
                                <td><?php echo $dato->Servicios_y_comodidad; ?></td>
                                <td><?php echo $dato->Dificultad_camino; ?></td>
                                <td><a class="text-success" href="editar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos de rutas:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Origen: </label>
                        <input type="text" class="form-control" name="Origen" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Destino : </label>
                        <input type="text" class="form-control" name="Destino" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Distancia: </label>
                        <input type="number" class="form-control" name="Distancia" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Duracion del viaje: </label>
                        <input type="number" class="form-control" name="Duracion_viaje" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Atracciones cercanas: </label>
                        <input type="text" class="form-control" name="Atracc_cercanas" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Servicios y comodidad: </label>
                        <input type="text" class="form-control" name="Servicios_y_comodidad" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dificultad de camino: </label>
                        <input type="text" class="form-control" name="Dificultad_camino" autofocus >
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?php include 'footer.php' ?>