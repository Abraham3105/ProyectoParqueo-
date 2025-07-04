<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoParqueo-/Models/UsuarioModel.php';


// INICIAR SESIÓN
if (isset($_POST["btnIniciarSesion"])) {
    $correo = $_POST["txtCorreo"];
    $contrasenna = $_POST["txtContrasenna"];

    $resultado = ValidarInicioSesionModel($correo, $contrasenna);

    if ($resultado && oci_fetch_array($resultado, OCI_ASSOC)) {
        header("Location: ../../Views/Home/principal.php");
        exit();
    } else {
        $_SESSION["mensajeError"] = "Su información no fue validada correctamente.";
        header("Location: ../../Views/Usuario/Login.php");
        exit();
    }
}

// REGISTRAR USUARIO
if (isset($_POST["btnRegistrarUsuario"])) {
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $identificacion = $_POST["txtIdentificacion"];
    $contrasenna = $_POST["txtContrasenna"];

    $respuesta = RegistrarUsuarioModel($nombre, $correo, $identificacion, $contrasenna);

    if ($respuesta) {
        header("Location: ../../Views/Usuario/Login.php");
        exit();
    } else {
        $_SESSION["mensajeError"] = "Su información no fue registrada correctamente.";
        header("Location: ../../Views/Usuario/CrearCuenta.php");
        exit();
    }
}

// RECUPERAR CONTRASEÑA
if (isset($_POST["btnRecuperarAcceso"])) {
    $correo = $_POST["txtCorreo"];
    $resultado = ValidarCorreoModel($correo);

    if ($resultado && $datos = oci_fetch_array($resultado, OCI_ASSOC)) {
        $contrasenna = generarContrasenna(); // Deberías tener esta función en Utilidades

        ActualizarContrasennaModel($datos["IDUSUARIO"], $contrasenna);

        // Simulación de mensaje de correo
        $mensaje = "
        Estimado(a) {$datos["NOMBRE"]},<br><br>
        Se ha generado el siguiente código de seguridad: <b>{$contrasenna}</b><br>
        Recuerde cambiar su contraseña una vez ingrese al sistema.";

        // Aquí deberías enviar el correo real con PHPMailer o similar

        $_SESSION["mensajeExito"] = "Nueva contraseña generada. Revise su correo.";
        header("Location: ../../Views/Usuario/Login.php");
        exit();
    } else {
        $_SESSION["mensajeError"] = "No se encontró el correo proporcionado.";
        header("Location: ../../Views/Usuario/Recuperar.php");
        exit();
    }
}
?>