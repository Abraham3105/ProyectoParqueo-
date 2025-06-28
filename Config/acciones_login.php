<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['emailUser'];
    $pass = $_POST['passwordUser'];

    $sql = "SELECT * FROM tbl_clientes WHERE emailUser = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        if (password_verify($pass, $row['passwordUser'])) {
            $_SESSION['IdUser'] = $row['IdUser'];
            $_SESSION['emailUser'] = $row['emailUser'];
            header("Location: ../Views/Home/Agenda.php");
            exit();
        }
    }

    header("Location: ../Views/Usuario/Login.php?error=1");
    exit();
}
?>
