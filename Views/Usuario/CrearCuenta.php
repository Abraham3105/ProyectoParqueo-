<?php
// Llamar al controlador del usuario
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoParqueo-/Controllers/UsuarioController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Cuenta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Estilos -->
  <link rel="stylesheet" href="../../Views/Estilos/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../Views/Estilos/feather.css">
  <link rel="stylesheet" href="../../Views/Estilos/loader.css">
  <link rel="stylesheet" href="../../Views/Estilos/login.css">
  <link rel="stylesheet" href="../../Views/Estilos/style.css">
  <link rel="stylesheet" href="../../Views/Estilos/themify-icons.css">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="../../Views/Imagenes/logo.png" alt="logo">
              </div>
              <h4>Crear Cuenta</h4>
              <h6 class="font-weight-light">Ingrese los datos para registrarse.</h6>

              <!-- Formulario de registro -->
              <form class="pt-3" method="post" action="" autocomplete="off">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="txtNombre" placeholder="Nombre completo" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="txtCorreo" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="txtContrasenna" placeholder="Contraseña" required>
                </div>
                <div class="mt-3">
                  <button type="submit" name="btnRegistrarUsuario" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Crear cuenta</button>
                </div>

                <?php if (isset($mensajeError)): ?>
                <div class="alert alert-danger mt-3" role="alert">
                  <?= $mensajeError ?>
                </div>
                <?php endif; ?>

                <div class="text-center mt-4 font-weight-light">
                  ¿Ya tienes cuenta? <a href="Login.php" class="text-primary">Iniciar sesión</a>
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
