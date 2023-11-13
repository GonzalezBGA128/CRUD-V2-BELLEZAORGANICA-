<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idEmpleado'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idEmpleado = $_GET['idEmpleado'];

    $sentencia = $bd->prepare("SELECT * from empleados where idEmpleado = ?;");
    $sentencia->execute([$idEmpleado]);
    $empleados = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empleados);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarproceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="Nombre" required 
                        value="<?php echo $empleados->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Paterno: </label>
                        <input type="text" class="form-control" name="ApPaterno" required 
                        value="<?php echo $empleados->ApPaterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Materno: </label>
                        <input type="text" class="form-control" name="ApMaterno" required 
                        value="<?php echo $empleados->ApMaterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="Edad" autofocus required
                        value="<?php echo $empleados->Edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto: </label>
                        <input type="text" class="form-control" name="Puesto" autofocus required
                        value="<?php echo $empleados->Puesto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="Direccion" autofocus required
                        value="<?php echo $empleados->Direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="email" class="form-control" name="Correo" autofocus required
                        value="<?php echo $empleados->Correo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idEmpleado" value="<?php echo $empleados->idEmpleado; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>
<?php include 'template/footer.php' ?>