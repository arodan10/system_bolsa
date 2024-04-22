<?php
include("../includes/conectar.php");
$conexion = conectar();

// Recibimos los datos del formulario
$razon_social = $_POST['razon_social'];
$ruc = $_POST['ruc'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];


// Insertamos los datos en la tabla 'empresas'
$sql = "INSERT INTO empresas (razon_social, ruc, direccion, telefono, correo) 
        VALUES ('$razon_social', '$ruc', '$direccion', '$telefono', '$correo')";

mysqli_query($conexion, $sql) or die("Error al guardar la empresa.");

header("Location: listar_empresas.php");
?>