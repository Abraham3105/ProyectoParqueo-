<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Vehículos por Usuario</title>
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
          <h4 class="card-title">Reporte de Vehículos por Usuario</h4>
          <a href="Reportes.php" class="btn btn-light btn-sm">
            <i class="icon-arrow-left"></i> Volver a Reportes
          </a>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="table-light">
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Correo</th>
                  <th>Placa</th>
                  <th>Modelo</th>
                  <th>Tipo</th>
                </tr>
              </thead>
              <tbody>
                <!-- Datos de ejemplo para pruebas -->
                <tr>
                  <td>1</td>
                  <td>Josue Navarro</td>
                  <td>josue@example.com</td>
                  <td>XYZ123</td>
                  <td>Fortuner</td>
                  <td>SUV</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Andrea Vargas</td>
                  <td>andrea@example.com</td>
                  <td>ABC456</td>
                  <td>Corolla</td>
                  <td>Sedán</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Michael Mora</td>
                  <td>michael@example.com</td>
                  <td>DEF789</td>
                  <td>Hilux</td>
                  <td>Camioneta</td>
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
