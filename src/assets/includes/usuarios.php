<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión solo si no hay una activa
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include '../includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'navbar.php'; ?> <!-- Importa el menú de navegación -->

<div class="container mt-4">
    <h2>Gestión de Usuarios</h2>
    <p>Aquí puedes ver y gestionar los usuarios del sistema.</p>
</div>

</body>
</html>
