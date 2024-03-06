<?php
session_start();

// Eliminar la sesión
session_destroy();

// Eliminar la cookie
setcookie("sesion_time", "", time() - 3600); // Expira inmediatamente

// Redirigir al formulario
header("Location: temp_users.php");
?>