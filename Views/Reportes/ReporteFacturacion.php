<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Facturación</title>
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
          <h4 class="card-title">Reporte de Facturación</h4>
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
                  <th># Factura</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>Monto</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <!-- Simulación de datos -->
                <tr>
                  <td>F001</td>
                  <td>Josue Navarro</td>
                  <td>2025-06-17</td>
                  <td>₡6,000</td>
                  <td><label class="badge badge-success">Pagada</label></td>
                  hola
                </tr>
                <tr>
                  <td>F002</td>
                  <td>Andrea Vargas</td>
                  <td>2025-06-16</td>
                  <td>₡3,500</td>
                  <td><label class="badge badge-warning">Pendiente</label></td>
                </tr>
                <tr>
                  <td>F003</td>
                  <td>Michael Mora</td>
                  <td>2025-06-15</td>
                  <td>₡4,200</td>
                  <td><label class="badge badge-danger">Anulada</label></td>
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
