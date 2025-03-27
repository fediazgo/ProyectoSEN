<?php

// Mostrar errores en el entorno de desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de conexión
$servidor = "localhost"; 
$usuario = "root"; 
$password = "701221"; 
$base_datos = "proyecto_sen"; 

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if ($conexion->connect_errno) {
    die("❌ Error de conexión: " . $conexion->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos";
}

?>
