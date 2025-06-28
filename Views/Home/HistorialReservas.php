<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de Reservas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
 
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">

      <!-- Título centrado -->
      <div class="row mb-4">
        <div class="col-12 text-center">
          <h3 class="font-weight-bold">Historial de Reservas</h3>
        </div>
      </div>

      <!-- Tabla centrada -->
      <div class="row justify-content-center">
        <div class="col-12 col-lg-11 grid-margin stretch-card">
          <div class="card p-4">
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover table-striped text-center align-middle" style="font-size: 0.95rem;">
                  <thead class="table-light">
                    <tr>
                      <th># Reserva</th>
                      <th>Cliente</th>
                      <th>Vehículo</th>
                      <th>Fecha Entrega</th>
                      <th>Fecha Recogida</th>
                      <th>Estado</th>
                      <th>Monto</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>R-001</td>
                      <td>María López</td>
                      <td>XYZ-123</td>
                      <td>2025-05-10</td>
                      <td>2025-05-12</td>
                      <td><span class="badge badge-success">Completada</span></td>
                      <td>₡47.000</td>
                      <td>
                        <button class="btn btn-sm btn-outline-info">Ver</button>
                      </td>
                    </tr>
                    <tr>
                      <td>R-002</td>
                      <td>Carlos Ruiz</td>
                      <td>ABC-456</td>
                      <td>2025-06-01</td>
                      <td>2025-06-02</td>
                      <td><span class="badge badge-success">Completada</span></td>
                      <td>₡53.000</td>
                      <td>
                        <button class="btn btn-sm btn-outline-info">Ver</button>
                      </td>
                    </tr>
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
