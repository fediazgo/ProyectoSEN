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
    <title>Modificar Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
    <h2>Modificar Pedido</h2>
    <form>
    <div class="mb-3">
        <label class="form-label">Codigo del pedido</label>
        <input type="text" class="form-control w-25" required> <!-- 25% del ancho -->

        <label class="form-label">Descripción</label>
        <input type="text" class="form-control w-100" required> <!-- 100% del ancho -->

        <label class="form-label">Fecha</label>
        <input type="text" class="form-control w-25" required> <!-- 50% del ancho -->
    </div>
    <button type="submit" class="btn btn-primary">modificar Pedido</button>
</form>

    <p>Aquí puedes buscar y modificar los pedidos existentes.</p>
</div>

</body>
</html>

