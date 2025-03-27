<?php
session_start();
include_once __DIR__ . "/../config/db.php"; // Asegura que se incluya correctamente la conexión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se recibieron los datos
    if (!isset($_POST['email'], $_POST['password'])) {
        $_SESSION['error'] = "Por favor, completa todos los campos.";
        header("Location: ../login.php");
        exit();
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verificar si los campos están vacíos
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Por favor, completa todos los campos.";
        header("Location: ../login.php");
        exit();
    }

    // Preparar la consulta para evitar SQL Injection
    if ($stmt = $conexion->prepare("SELECT id, password FROM users WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Si el usuario existe
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($password, $hashed_password)) {
                // Regenerar la sesión para evitar secuestros
                session_regenerate_id(true);
                $_SESSION['user_id'] = $id;

                $stmt->close();
                $conexion->close();

                header("Location: /Sistema_SEN/dashboard.php");
                exit();

            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
            }
        } else {
            $_SESSION['error'] = "Usuario no encontrado.";
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Error al ejecutar la consulta.";
    }

    $conexion->close();
}

// Redirigir de nuevo al login si hay un fallo
header("Location: ../login.php");
exit();
?>
