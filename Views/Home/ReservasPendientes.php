<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reservas Pendientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
  <link rel="stylesheet" href="../../Views/Estilos/login.css">
  <link rel="stylesheet" href="../../Views/Estilos/themify-icons.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">

      <!-- Título -->
      <div class="row mb-4">
        <div class="col-12 text-center">
          <h3 class="font-weight-bold">Reservas Pendientes</h3>
        </div>
      </div>

      <!-- Tabla centrada -->
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 stretch-card">
          <div class="card p-4">
            <div class="table-responsive">
              <table class="table table-striped text-center align-middle" style="font-size: 0.95rem;">
                <thead class="table-light">
                  <tr>
                    <th># Reserva</th>
                    <th>Cliente</th>
                    <th>Vehículo</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>R-001</td>
                    <td>María</td>
                    <td>ABC-123</td>
                    <td>2025-06-18</td>
                    <td><button class="btn btn-sm btn-success">Confirmar</button></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Paginación simulada -->
            <div class="d-flex justify-content-between align-items-center mt-3">
              <small class="text-muted">Mostrando registros del 1 al 1 de un total de 1 registros</small>
              <nav>
                <ul class="pagination pagination-sm mb-0">
                  <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
              </nav>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
