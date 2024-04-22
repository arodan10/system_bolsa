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
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#asignarUsuarioModal<?php echo $fila['id']; ?>">Asignar</button>
        
        <div class="modal fade" id="asignarUsuarioModal<?php echo $fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="asignarUsuarioModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="asignarUsuarioModalLabel">Asignar Usuario a Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Contenido del modal: formulario para asignar usuario -->
                <form action="asignar_usuario.php" method="POST">
                  <input type="hidden" name="id_empresa" value="<?php echo $fila['id']; ?>">
                  <div class="form-group">
                    <label for="usuario">Seleccionar Usuario:</label>
                    <select class="form-control" name="id_usuario" required>
                    <?php
                      $usuarios = mysqli_query($conexion, "SELECT id, nombres FROM usuarios WHERE asignacion=0");
                      while ($user = mysqli_fetch_array($usuarios)) {
                          echo "<option value='" . $user['id'] . "'>" . $user['nombres'] . "</option>";
                      }
                      ?>

                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Asignar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

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