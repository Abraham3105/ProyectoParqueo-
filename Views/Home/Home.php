<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
</head>
<body>
  <?php include("../Funciones/nav.php"); ?>

  <div class="main-panel">
    <div class="content-wrapper">

      <div class="row mb-4">
        <div class="col-12 text-center">
          <h2>Bienvenido al Sistema de Parqueo</h2>
          <p class="text-muted">Seleccione una opción del menú lateral para comenzar.</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-3 stretch-card">
          <div class="card text-center">
            <div class="card-body">
              <h5>Mi Perfil</h5>
              <a href="../Usuario/MiPerfil.php" class="btn btn-outline-primary btn-sm mt-2">Acceder</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 stretch-card">
          <div class="card text-center">
            <div class="card-body">
              <h5>Mis Vehículos</h5>
              <a href="../Vehiculos/Vehiculos.php" class="btn btn-outline-primary btn-sm mt-2">Acceder</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 stretch-card">
          <div class="card text-center">
            <div class="card-body">
              <h5>Reportes</h5>
              <a href="../Reportes/Reportes.php" class="btn btn-outline-primary btn-sm mt-2">Acceder</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
