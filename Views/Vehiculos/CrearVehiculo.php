<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Vehículo</title>
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
      <div class="row justify-content-center">
        <div class="col-lg-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Registrar Mi Vehículo</h4>
              <p class="text-muted text-center mb-4">Complete la información para guardar su vehículo</p>

              <!-- Formulario -->
              <form action="#" method="post" class="row g-3">

                <div class="form-group col-md-6">
                  <label for="placa">Número de Placa</label>
                  <input type="text" class="form-control" id="placa" name="placa" placeholder="Ej: XYZ123" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="modelo">Modelo del Vehículo</label>
                  <select class="form-control" id="modelo" name="modelo" required>
                    <option value="">Seleccione un modelo</option>
                    <option value="1">Corolla</option>
                    <option value="2">Hilux</option>
                    <option value="3">Fortuner</option>
                  </select>
                </div>

                <div class="form-group col-12 text-end">
                  <button type="submit" class="btn btn-primary">Guardar Vehículo</button>
                </div>
              </form>

              <div class="mt-3">
                <a href="Vehiculos.php" class="btn btn-sm btn-light"><i class="icon-arrow-left"></i> Volver a mis vehículos</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
