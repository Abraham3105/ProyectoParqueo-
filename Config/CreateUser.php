<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config.php');

    $email = $_POST['emailUser'];
    $nombre = $_POST['nombre_completo'];
    $pass = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO tbl_clientes (emailUser, passwordUser, nombre_completo, rol) VALUES (?, ?, ?, 0)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $email, $pass, $nombre);
    mysqli_stmt_execute($stmt);

    header("Location: ../Views/Usuario/Login.php?registro=ok");
    exit();
}
?>
