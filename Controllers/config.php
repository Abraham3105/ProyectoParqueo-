<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "bd_parking_pruebas";

$con = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
if (!$con) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
