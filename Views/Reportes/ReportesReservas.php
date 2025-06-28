<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Reservas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
          <h4 class="card-title">Historial de Reservas</h4>
          <a href="Reportes.php" class="btn btn-light btn-sm">
            <i class="icon-arrow-left"></i> Volver a Reportes
          </a>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="table-light">
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Placa</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <!-- Simulación de datos -->
                <tr>
                  <td>1</td>
                  <td>Josue Navarro</td>
                  <td>XYZ123</td>
                  <td>2025-06-18</td>
                  <td>10:00 a.m.</td>
                  <td><label class="badge badge-success">Confirmada</label></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Andrea Vargas</td>
                  <td>ABC456</td>
                  <td>2025-06-16</td>
                  <td>03:00 p.m.</td>
                  <td><label class="badge badge-danger">Cancelada</label></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Michael Mora</td>
                  <td>DEF789</td>
                  <td>2025-06-14</td>
                  <td>08:30 a.m.</td>
                  <td><label class="badge badge-warning">Pendiente</label></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
