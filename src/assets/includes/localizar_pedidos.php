<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión solo si no hay una activa
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localizar Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
    <h2>Localizar Pedido</h2>
    <p>Aquí puedes buscar un pedido por su ID o cliente.</p>
</div>

</body>
</html>
