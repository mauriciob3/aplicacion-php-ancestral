<?php

// Configuración de la conexión a la base de datos
$servidor = "localhost";
$baseDeDatos = "ancestral";
$usuario = "root";
$contrasenia = "";

try {
    // Intentar establecer la conexión utilizando PDO
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos;charset=utf8mb4", $usuario, $contrasenia);

    // Configurar PDO para que lance excepciones en caso de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: Configurar PDO para que devuelva los resultados en un formato de array asociativo
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Opcional: Configurar el tiempo de espera de la conexión (en segundos)
    $conexion->setAttribute(PDO::ATTR_TIMEOUT, 10);

    // Opcional: Configurar el uso de emulación de consultas preparadas (false para evitar vulnerabilidades de inyección SQL)
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $ex) {
    // Capturar cualquier excepción que ocurra durante la conexión
    echo "Error de conexión: " . $ex->getMessage();
}
?>
