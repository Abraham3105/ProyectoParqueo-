<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mis Vehículos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
  <link rel="stylesheet" href="../../Views/Estilos/feather.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
          <h4 class="card-title">Mis Vehículos Registrados</h4>
          <a href="CrearVehiculo.php" class="btn btn-primary btn-sm">
            <i class="icon-plus"></i> Registrar Nuevo Vehículo
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead class="table-light">
                    <tr>
                      <th>#</th>
                      <th>Placa</th>
                      <th>Modelo</th>
                      <th>Tipo</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>XYZ123</td>
                      <td>Fortuner</td>
                      <td>SUV</td>
                      <td><label class="badge badge-success">Activo</label></td>
                      <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>ABC789</td>
                      <td>Corolla</td>
                      <td>Sedán</td>
                      <td><label class="badge badge-success">Activo</label></td>
                      <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                      </td>
                    </tr>
                    <!-- Aquí irían más registros dinámicos -->
                  </tbody>
                </table>
              </div>

            </div> <!-- card-body -->
          </div> <!-- card -->
        </div> <!-- col -->
      </div> <!-- row -->
    </div> <!-- content-wrapper -->
  </div> <!-- main-panel -->
</body>
</html>
