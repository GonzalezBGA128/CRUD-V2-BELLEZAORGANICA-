<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["Nombre"]) || empty($_POST["ApPaterno"]) || empty($_POST["ApMaterno"]) || empty($_POST["Edad"]) || empty($_POST["Puesto"]) || empty($_POST["Direccion"]) || empty($_POST["Correo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["Nombre"];
    $appaterno = $_POST["ApPaterno"];
    $apmaterno = $_POST["ApMaterno"];
    $edad = $_POST["Edad"];
    $puesto = $_POST["Puesto"];
    $direccion = $_POST["Direccion"];
    $correo = $_POST["Correo"];
    
    $sentencia = $bd->prepare("INSERT INTO empleados(Nombre,ApPaterno,ApMaterno,Edad,Puesto,Direccion,Correo) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$appaterno,$apmaterno,$edad,$puesto,$direccion,$correo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>