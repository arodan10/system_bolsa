<?php
include("../includes/conectar.php");
$conexion = conectar();

$id_empresa = $_POST['id_empresa'];
$id_usuario_nuevo = $_POST['id_usuario'];

// Paso 1: Obtener el ID del usuario actualmente asignado
$sqlConsulta = "SELECT id_usuario FROM empresas WHERE id='$id_empresa'";
$resultado = mysqli_query($conexion, $sqlConsulta);
if ($fila = mysqli_fetch_assoc($resultado)) {
    $id_usuario_actual = $fila['id_usuario'];

    // Paso 2: Verificar si hay un cambio en el usuario asignado
    if ($id_usuario_actual != $id_usuario_nuevo) {
        // Revertir el estado del usuario actualmente asignado, si es necesario
        $sqlRevertir = "UPDATE usuarios SET asignacion=0 WHERE id='$id_usuario_actual'";
        mysqli_query($conexion, $sqlRevertir) or die("Error al revertir el estado del usuario actual: " . mysqli_error($conexion));
    }
}

// Paso 3: Asignar el nuevo usuario a la empresa
$sqlAsignar = "UPDATE empresas SET id_usuario='$id_usuario_nuevo' WHERE id='$id_empresa'";
mysqli_query($conexion, $sqlAsignar) or die("Error al asignar el usuario a la empresa: " . mysqli_error($conexion));

// Paso 4: Actualizar el estado de asignación del nuevo usuario
$sqlActualizar = "UPDATE usuarios SET asignacion=1 WHERE id='$id_usuario_nuevo'";
mysqli_query($conexion, $sqlActualizar) or die("Error al actualizar el estado del nuevo usuario.");

header("Location: listar_empresas.php");
?>
