<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Catálogo: Tipos de Vehículo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Catálogo: Tipos de Vehículo</h4>

              <!-- Formulario -->
              <form class="forms-sample row g-3">
                <div class="form-group col-md-6">
                  <label for="tipoVehiculo">Tipo de Vehículo</label>
                  <input type="text" class="form-control" id="tipoVehiculo" placeholder="Ej: Sedan, SUV, Moto">
                </div>
                <div class="form-group col-md-6">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" placeholder="Ej: Vehículo compacto familiar">
                </div>
                <div class="form-group col-12 text-end">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>

              <hr>

              <!-- Tabla -->
              <div class="table-responsive mt-4">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tipo</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>SUV</td>
                      <td>Vehículo deportivo utilitario</td>
                      <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Motocicleta</td>
                      <td>Doble propósito</td>
                      <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
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
