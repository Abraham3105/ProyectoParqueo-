<?php
function OpenDB() {
    $host = "localhost";
    $port = "1521";
    $service = "XEPDB1";
    $user = "MNPROYECTO";
    $password = "tu_contrasena"; // Cambia por tu contraseña

    $connStr = "(DESCRIPTION =
                    (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port))
                    (CONNECT_DATA = (SERVICE_NAME = $service))
                )";

    $conn = oci_connect($user, $password, $connStr, 'AL32UTF8');
    if (!$conn) {
        $e = oci_error();
        die("Error al conectar a Oracle: " . $e['message']);
    }

    return $conn;
}

function CloseDB($conn) {
    oci_close($conn);
}

// ValidarInicioSesionModel con REF CURSOR (devuelve datos del usuario)
function ValidarInicioSesionModel($correo, $contrasenna) {
    $conn = OpenDB();
    $sql = "BEGIN ValidarInicioSesion(:correo, :contrasenna, :resultado); END;";

    $stmt = oci_parse($conn, $sql);

    $cursor = oci_new_cursor($conn); // REF CURSOR

    oci_bind_by_name($stmt, ":correo", $correo);
    oci_bind_by_name($stmt, ":contrasenna", $contrasenna);
    oci_bind_by_name($stmt, ":resultado", $cursor, -1, OCI_B_CURSOR);

    oci_execute($stmt);
    oci_execute($cursor); // Ejecutar cursor aparte

    return $cursor; // Se cierra afuera si se necesita más adelante
}

// RegistrarUsuarioModel
function RegistrarUsuarioModel($nombre, $correo, $identificacion, $contrasenna) {
    $conn = OpenDB();
    $sql = "BEGIN RegistrarUsuario(:nombre, :correo, :identificacion, :contrasenna); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":correo", $correo);
    oci_bind_by_name($stmt, ":identificacion", $identificacion);
    oci_bind_by_name($stmt, ":contrasenna", $contrasenna);

    $success = oci_execute($stmt);
    CloseDB($conn);
    return $success;
}

// ValidarCorreoModel con REF CURSOR también
function ValidarCorreoModel($correo) {
    $conn = OpenDB();
    $sql = "BEGIN ValidarCorreo(:correo, :resultado); END;";
    $stmt = oci_parse($conn, $sql);

    $cursor = oci_new_cursor($conn);

    oci_bind_by_name($stmt, ":correo", $correo);
    oci_bind_by_name($stmt, ":resultado", $cursor, -1, OCI_B_CURSOR);

    oci_execute($stmt);
    oci_execute($cursor);

    return $cursor;
}

//  ActualizarContrasennaModel
function ActualizarContrasennaModel($idUsuario, $contrasenna) {
    $conn = OpenDB();
    $sql = "BEGIN ActualizarContrasenna(:idUsuario, :contrasenna); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":idUsuario", $idUsuario);
    oci_bind_by_name($stmt, ":contrasenna", $contrasenna);

    $success = oci_execute($stmt);
    CloseDB($conn);

    return $success;
}
?>