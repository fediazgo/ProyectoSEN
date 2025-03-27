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

   
    
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('src/assets/img/bg01.jpeg') no-repeat center center fixed;
            background-size: cover;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contenedor del formulario */
        .login-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 420px;
        }

        h1 {
            margin-bottom: 15px;
            color: #333;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Estilos de los inputs */
        .login-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Botón de inicio de sesión */
        .login-button {
            width: 100%;
            padding: 10px;
            background-color:rgb(15, 2, 139);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-button:hover {
            background-color:rgb(15, 2, 131);
        }

        /* Enlaces de recuperación */
        .login-links {
            margin-top: 10px;
        }

        .login-links a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .login-links a:hover {
            text-decoration: underline;
        }

        .olvidar-password {
    display: block; /* Hace que ocupe toda la línea */
    margin-top: -10px; /* Ajusta este valor según la separación */
    font-size: 14px;
}
    </style>
</head>
<body>

<div class="login-container">

<div class="logo"><h4>Software Express Now SEN</h4></div>

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

        <!-- <a href="recuperar.php" class="olvidar-password">¿Olvidaste tu contraseña?</a> -->
        <div class="login-links">
        <a href="#">¿Olvidaste tu contraseña?</a>
        </div>

       <button type="submit" class="login-button">Ingresar</button>
    </form>

    <div class="login-links">
    <a href="../sistema_sen/public/registro_usuario.php">¡Regístrese!</a>
</div>

  


</div>

</body>
</html>
