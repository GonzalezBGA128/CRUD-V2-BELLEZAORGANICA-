<?php
    print_r($_POST);
    if(!isset($_POST['idEmpleado'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idEmpleado = $_POST['idEmpleado'];
    $Nombre = $_POST['Nombre'];
    $ApPaterno = $_POST['ApPaterno'];
    $ApMaterno = $_POST['ApMaterno'];
    $Edad = $_POST['Edad'];
    $Puesto = $_POST['Puesto'];
    $Direccion = $_POST['Direccion'];
    $Correo = $_POST['Correo'];
    $sentencia = $bd->prepare("UPDATE empleados SET 
    Nombre = ?, 
    ApPaterno = ?, 
    ApMaterno = ?,
    Edad = ?,
    Puesto = ?,
    Direccion = ?, 
    Correo = ? where idEmpleado = ?;");
    $resultado = $sentencia->execute([$Nombre, $ApPaterno, $ApMaterno, $Edad, $Puesto, $Direccion, $Correo,$idEmpleado]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>