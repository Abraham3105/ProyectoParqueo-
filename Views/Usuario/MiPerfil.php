<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Perfil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS base -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">

      <div class="row justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Mi Perfil</h4>

              <!-- Aquí podrían mostrarse mensajes de éxito/error -->
              <div class="mt-4">
                <div class="form-group">
                  <label>Nombre completo</label>
                  <input type="text" class="form-control" value="Josue Navarro" readonly>
                </div>

                <div class="form-group">
                  <label>Correo electrónico</label>
                  <input type="email" class="form-control" value="josue@example.com" readonly>
                </div>

                <div class="form-group">
                  <label>Rol</label>
                  <input type="text" class="form-control" value="Usuario" readonly>
                </div>

                <div class="form-group">
                  <label>Estado</label>
                  <input type="text" class="form-control text-success" value="Activo" readonly>
                </div>

                <!-- Botón futuro para editar -->
                <div class="mt-4 text-end">
                  <a href="#" class="btn btn-outline-secondary disabled">Editar información</a>
                </div>
              </div>

            </div> <!-- card-body -->
          </div> <!-- card -->
        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- content-wrapper -->
  </div> <!-- main-panel -->
</body>
</html>
