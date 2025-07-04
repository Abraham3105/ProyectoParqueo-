<?php
function OpenDB() {
    $host = "localhost";
    $port = "1521";
    $dbname = "XEPDB1";
    $user = "MNPROYECTO";
    $password = "tu_contrasena";

    $conn = new PDO(
        "oci:dbname=(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))(CONNECT_DATA=(SERVICE_NAME=$dbname)));charset=AL32UTF8",
        $user,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function CloseDB($conn) {
    $conn = null;
}

?>