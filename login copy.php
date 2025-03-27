<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema SEN - Login</title>
    <link rel="stylesheet" href="./assets/css/style.css"> <!-- Ajusta la ruta según sea necesario -->
</head>
<body class="login-body">

<div class="login-container">
    <h1>Iniciar Sesión</h1>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (isset($_SESSION['error'])): ?>
        <p class="error-message"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Formulario de login -->
    <form action="config/validar.php" method="POST">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" class="login-input" placeholder="Correo electrónico" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" class="login-input" placeholder="Contraseña" required>

        <button type="submit" class="login-button">Ingresar</button>
    </form>

    <div class="login-links">
        <a href="#">¿Olvidaste tu contraseña?</a>
    </div>
</div>

</body>
</html>
