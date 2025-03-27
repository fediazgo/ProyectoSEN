<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="../src/assets/css/style.css?v=1.0">

</head>
<body>
    <div class="container">
            <form action="" method="POST" class="formulario">
                <h2 class="Titulo">Registrar Usuario</h2>
                <?php
                    include("../config/db.php");
                    include("../config/controlador_registrar.php");
                ?>
                <div class="Nombre">
                    <label for="">Nombre</label>   
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                </div>

                <div class="Apellido">
                    <label for="">Apellido</label>   
                    <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" required>
                </div>

                <div class="Usuario">
                    <label for="">usuario</label>   
                    <input type="text" name="usuario" id="usuario" placeholder="usuario" required>
                </div>

                <div class="Email">
                    <label for="">Correo Electronico</label>   
                    <input type="email" name="email" id="email" placeholder="email" required>
                </div>

                <div class="Contraseña">
                    <label for="">Contraseña</label>   
                    <input type="password" name="password" id="password" placeholder="password" required>
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