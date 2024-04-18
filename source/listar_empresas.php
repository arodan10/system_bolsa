<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>
<div class="container-fluid">
    <h1>Lista de Empresas</h1>
    <?php
    $sql = "SELECT * FROM empresas";
    $registros = mysqli_query($conexion, $sql);
    echo "<table class='table table-success table-hover'>";
    echo "<th>Razón Social</th><th>RUC</th><th>Dirección</th><th>Teléfono</th><th>Correo</th><th>Acciones</th>";
    while ($fila = mysqli_fetch_array($registros)) {
        echo "<tr>";
        echo "<td>".$fila['razon_social']."</td>";
        echo "<td>".$fila['ruc']."</td>";
        echo "<td>".$fila['direccion']."</td>";
        echo "<td>".$fila['telefono']."</td>";
        echo "<td>".$fila['correo']."</td>";
        echo "<td>";
        ?>
        <button type="button" class="btn btn-primary" onClick="f_editar('<?php echo $fila['id']; ?>');">Editar</button>
        <button type="button" class="btn btn-danger" onClick="f_eliminar('<?php echo $fila['id']; ?>');">Eliminar</button>
        <?php
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>
<script>
function f_editar(id) {
    location.href = "modificar_empresa.php?id=" + id;
}
function f_eliminar(id) {
    if (confirm('¿Está seguro de eliminar esta empresa?')) {
        location.href = "eliminar_empresa.php?id=" + id;
    }
}
</script>
<?php
include("../includes/foot.php");
?>
