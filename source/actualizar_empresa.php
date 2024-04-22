<?php
include("../includes/conectar.php");
$conexion = conectar();

$id = $_POST['id'];
$razon_social = $_POST['razon_social'];
$ruc = $_POST['ruc'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "UPDATE empresas SET razon_social='$razon_social', ruc='$ruc', direccion='$direccion', telefono='$telefono', correo='$correo' WHERE id='$id'";

mysqli_query($conexion, $sql) or die("Error al actualizar la empresa.");

header("Location: listar_empresas.php");
?>