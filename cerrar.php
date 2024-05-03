<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location: /ANCESTRAL/login.php");
exit; // Asegurar que el script se detenga después de la redirección
?>
