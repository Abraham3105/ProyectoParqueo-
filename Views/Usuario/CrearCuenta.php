<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Cuenta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS base -->
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
              <form class="pt-3" action="#" method="post" autocomplete="off">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="nombre_completo" placeholder="Nombre completo">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="emailUser" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="passwordUser" placeholder="Contraseña">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#">Crear cuenta</a>
                </div>
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