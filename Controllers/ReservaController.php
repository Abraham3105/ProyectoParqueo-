<?php
// Controllers/ReservaController.php
require_once("../Models/ReservaModel.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cliente = $_POST["cliente"] ?? null;
    $vehiculo = $_POST["vehiculo"] ?? null;
    $fecha = $_POST["fecha"] ?? null;
    $hora = $_POST["hora"] ?? null;

    if ($cliente && $vehiculo && $fecha && $hora) {
        $reservaModel = new ReservaModel();
        $resultado = $reservaModel->crearReserva($cliente, $vehiculo, $fecha, $hora);

        if ($resultado) {
            echo "<script>alert('Reserva creada exitosamente'); window.location.href='../../Views/Reservas/listarReservas.php';</script>";
        } else {
            echo "<script>alert('Error al crear la reserva'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Todos los campos son obligatorios'); window.history.back();</script>";
    }
}
?>
