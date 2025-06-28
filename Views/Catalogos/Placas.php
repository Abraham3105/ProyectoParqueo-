<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Catálogo: Placas</title>
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
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Catálogo: Placas Vehiculares</h4>

              <!-- Formulario -->
              <form class="forms-sample row g-3">
                <div class="form-group col-md-6">
                  <label for="modelo">Modelo Asociado</label>
                  <select class="form-control" id="modelo">
                    <option value="">Seleccione</option>
                    <option value="1">Corolla</option>
                    <option value="2">Fortuner</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="placa">Número de Placa</label>
                  <input type="text" class="form-control" id="placa" placeholder="Ej: ABC123">
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
                      <th>Placa</th>
                      <th>Modelo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>XYZ789</td>
                      <td>Corolla</td>
                      <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>DEF456</td>
                      <td>Fortuner</td>
                      <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
