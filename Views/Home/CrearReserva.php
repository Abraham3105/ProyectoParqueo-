<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Reserva</title>
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
          <h3 class="font-weight-bold">Crear Nueva Reserva</h3>
        </div>
      </div>

      <!-- Formulario centrado -->
      <div class="row justify-content-center">
        <div class="col-12 col-lg-8 grid-margin stretch-card">
          <div class="card p-4">
            <div class="card-body">

              <form>
                <div class="form-group mb-3">
                  <label>Cliente</label>
                  <input type="text" class="form-control" placeholder="Nombre del cliente" required>
                </div>

                <div class="form-group mb-3">
                  <label>Vehículo</label>
                  <input type="text" class="form-control" placeholder="Placa del vehículo" required>
                </div>

                <div class="form-group mb-3">
                  <label>Fecha</label>
                  <input type="date" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                  <label>Hora</label>
                  <input type="time" class="form-control" required>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Guardar Reserva</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
