<?php
include("../includes/conectar.php");
$conexion = conectar();

// Recibimos los datos del formulario
$razon_social = $_POST['razon_social'];
$ruc = $_POST['ruc'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$id_usuario = $_POST['id_usuario'];  // Asumiendo que se envía desde el formulario

// Insertamos los datos en la tabla 'empresas'
$sql = "INSERT INTO empresas (razon_social, ruc, direccion, telefono, correo, id_usuario) 
        VALUES ('$razon_social', '$ruc', '$direccion', '$telefono', '$correo', '$id_usuario')";

mysqli_query($conexion, $sql) or die("Error al guardar la empresa.");

header("Location: listar_empresas.php");
?>
