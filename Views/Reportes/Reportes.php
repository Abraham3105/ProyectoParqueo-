<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Módulo de Reportes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <h3 class="mb-4">Módulo de Reportes</h3>
      
      <div class="row">
        <!-- Reporte 1 -->
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Reporte de Vehículos por Usuario</h5>
              <p class="card-text">Lista de vehículos registrados por cada usuario.</p>
              <a href="ReporteVehiculosUsuario.php" class="btn btn-primary">Ver Reporte</a>
            </div>
          </div>
        </div>

        <!-- Reporte 2 -->
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Historial de Reservas</h5>
              <p class="card-text">Visualiza todas las reservas realizadas.</p>
              <a href="ReportesReservas.php" class="btn btn-primary">Ver Reporte</a>
            </div>
          </div>
        </div>

        <!-- Reporte 3 -->
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Facturación General</h5>
              <p class="card-text">Resumen de facturas emitidas por fecha.</p>
              <a href="ReporteFacturacion.php" class="btn btn-primary">Ver Reporte</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
