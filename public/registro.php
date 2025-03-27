<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../src/assets/css/style.css?v=1.0">


</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>

        <!-- Formulario que envía los datos a registrar.php -->
        <form action="../public/registrar.php" method="POST" class="form-container">

            <div class="input-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" required>
            </div>

            <div class="input-group">
                <label for="lastname">Apellido:</label>
                <input type="text" name="lastname" required>
            </div>

            <div class="input-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="reemail">Reingresar Correo Electrónico:</label>
                <input type="email" name="reemail" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="repassword">Confirmar Contraseña:</label>
                <input type="password" name="repassword" required>
            </div>

            <div class="input-group">
                <label for="role">Rol:</label>
                <select name="role" required>
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn">Registrarse</button>
        </form>

        <p>¿Ya tienes una cuenta? <a href="../login.php">Inicia sesión</a></p>
    </div>
</body>
</html>
