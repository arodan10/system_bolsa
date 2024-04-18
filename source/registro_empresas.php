<?php
    include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Inicio de la zona central del sistema -->
    <h1>Registro de Empresas nuevas</h1>

    <form method="POST" action="guardar_empresa.php">
  
    <div class="row mb-3">
      <label for="razon_social" class="col-sm-2 col-form-label">Razón Social</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="razon_social" required>
      </div>
    </div>

    <div class="row mb-3">
      <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="ruc" required>
      </div>
    </div>

    <div class="row mb-3">
      <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="direccion" required>
      </div>
    </div>

    <div class="row mb-3">
      <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="telefono">
      </div>
    </div>

    <div class="row mb-3">
      <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="correo" required>
      </div>
    </div>

    <div class="row mb-3">
      <label for="id_usuario" class="col-sm-2 col-form-label">ID Usuario</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="id_usuario" required>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Registrar Empresa</button>
    </form>

    <!-- Fin  de la zona central del sistema -->
</div>
<!-- /.container-fluid --> 

<?php
    include("../includes/foot.php");
?>
