<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agenda</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/login.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
  <link rel="stylesheet" href="../../Views/Estilos/themify-icons.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>
  <div class="main-panel">
  <div class="content-wrapper">

    <!-- Título centrado -->
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h3 class="font-weight-bold">Agenda De Reservas Activas</h3>
      </div>
    </div>

    <!-- Contenedor de la tabla -->
    <div class="row justify-content-center">
      <div class="col-12 col-lg-11 stretch-card">
        <div class="card p-4">
          <div class="table-responsive">
            <table class="table table-striped text-center align-middle" style="font-size: 0.95rem;">
              <thead class="table-light">
                <tr>
                  <th>N° Reserva</th>
                  <th>Cliente</th>
                  <th>DNI / CIF</th>
                  <th>Teléfono</th>
                  <th>Matrícula</th>
                  <th>Fecha de entrega</th>
                  <th>Hora de entrega</th>
                  <th>Fecha de recogida</th>
                  <th>Hora de recogida</th>
                  <th>Pago</th>
                  <th>Acción</th>
                  <th>Reserva / Factura</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>R-001</td>
                  <td>Jose</td>
                  <td>33344</td>
                  <td>4545</td>
                  <td>m</td>
                  <td>16/01/2024</td>
                  <td>06:15:00</td>
                  <td>26/01/2024</td>
                  <td>05:45</td>
                  <td><span class="text-success">47.00 €</span></td>
                  <td>
                    <button class="btn btn-success btn-sm">Enviar a Historial</button>
                  </td>
                  <td>
                    <a href="#" class="btn btn-outline-danger btn-sm">PDF</a>
                    <a href="#" class="btn btn-outline-secondary btn-sm">CSV</a>
                  </td>
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
</html>