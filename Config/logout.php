<?php
session_start();
session_destroy();
header("Location: ../Views/Usuario/Login.php");
exit();
?>
