<!-- Encabezado superior -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="../Home/Home.php">
        <img src="../../Views/Imagenes/logo.png" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" href="#">
          <i class="icon-head"></i>
          <span class="nav-profile-name">usuario@email.com</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- Sidebar -->
<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="../Home/Agenda.php">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Mi Agenda</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Home/ReservasPendientes.php">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Reservas Pendientes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Home/CrearReserva.php">
          <i class="icon-plus menu-icon"></i>
          <span class="menu-title">Crear Reserva</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Home/HistorialReservas.php">
          <i class="icon-clock menu-icon"></i>
          <span class="menu-title">Historial</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Reportes/Reportes.php">
          <i class="icon-clock menu-icon"></i>
          <span class="menu-title">Reportes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Catalogos/TipoVehiculo.php">
          <i class="icon-clock menu-icon"></i>
          <span class="menu-title">Catalogo</span>
        </a>
      </li>
    </ul>
  </nav>