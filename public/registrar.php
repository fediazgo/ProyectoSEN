<?php

require '../config/db.php'; // Conexión a la base de datos
require __DIR__ . '/../vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Habilitar reporte de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    manejarFormulario($_POST);
} else {
    mostrarMensaje("🚫 Error", "No se enviaron datos por POST.", "registro.php", "red");
}

/**
 * Manejar los datos recibidos por POST
 */
function manejarFormulario($postData) {
    global $conexion;

    $name = obtenerValor($postData, 'name');
    $last_name = obtenerValor($postData, 'last_name');
    $username = obtenerValor($postData, 'username');
    $password = obtenerValor($postData, 'password');
    $email = obtenerValor($postData, 'email');
    $role = obtenerValor($postData, 'role');

    // Validar campos obligatorios
    validarCampos([$name, $last_name, $username, $password, $email]);

    // Validar formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        mostrarMensaje("Error", "Correo electrónico no válido.", "registro.php", "red");
    }

    // Verificar si el correo ya existe en la base de datos
    verificarCorreoExistente($conexion, $email);

    // Encriptar la contraseña
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $verification_code = rand(100000, 999999);

    // Insertar usuario en la base de datos
    registrarUsuario($conexion, $name, $last_name, $username, $email, $password_hashed, $role, $verification_code);
}

/**
 * Validar que todos los campos no estén vacíos
 */
function validarCampos($campos) {
    foreach ($campos as $campo) {
        if (empty($campo)) {
            mostrarMensaje("Error", "Todos los campos son obligatorios.", "registro.php", "red");
        }
    }
}

/**
 * Obtener valor de un arreglo con una clave específica
 */
function obtenerValor($data, $key) {
    return isset($data[$key]) ? trim($data[$key]) : '';
}

/**
 * Verificar si el correo ya está registrado en la base de datos
 */
function verificarCorreoExistente($conexion, $email) {
    $sql_check = "SELECT id FROM users WHERE email = ?";
    $stmt_check = $conexion->prepare($sql_check);
    if (!$stmt_check) {
        mostrarMensaje("Error", "Error en la base de datos.", "registro.php", "red");
    }

    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        mostrarMensaje("Error", "El correo ya está registrado.", "registro.php", "red");
    }
    $stmt_check->close();
}

/**
 * Registrar usuario en la base de datos
 */
function registrarUsuario($conexion, $name, $last_name, $username, $email, $password_hashed, $role, $verification_code) {
    $sql = "INSERT INTO users (name, last_name, username, email, password, role, verification_code, email_verified) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        mostrarMensaje("Error", "Error al preparar la consulta.", "registro.php", "red");
    }

    $stmt->bind_param("ssssssi", $name, $last_name, $username, $email, $password_hashed, $role, $verification_code);

    if ($stmt->execute()) {
        $stmt->close();
        $conexion->close();
        mostrarMensaje("Registro Exitoso", "Revisa tu correo para verificar tu cuenta.", "dashboard.php", "blue");
    } else {
        mostrarMensaje("Error en el registro", "Ocurrió un problema.", "registro.php", "red");
    }

    $conexion->close();
}

/**
 * Mostrar mensaje al usuario
 */
function mostrarMensaje($titulo, $mensaje, $url, $color) {
    echo "<div style='
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: Arial, sans-serif;
    '>
        <div style='
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        '>
            <h2 style='color: {$color};'>{$titulo}</h2>
            <p style='font-size: 16px; color: #333;'>{$mensaje}</p>
            <a href='{$url}' style='
                display: inline-block;
                margin-top: 10px;
                padding: 10px 15px;
                background: " . ($color == 'green' ? '#28a745' : '#dc3545') . ";
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 16px;
            '>Volver</a>
        </div>
    </div>";
    exit();
}
?>
