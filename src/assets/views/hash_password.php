<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Hash</title>
    <script>
        function limpiarFormulario() {
            document.getElementById("passwordForm").reset(); // Limpia el formulario
            document.getElementById("hashOutput").innerHTML = ""; // Borra el resultado
        }
    </script>
</head>
<body>
    <h2>Generador de Hash de Contraseña</h2>
    
    <form method="POST" id="passwordForm">
        <label for="password">Ingresa una contraseña:</label>
        <input type="text" name="password" required>
        <button type="submit">Generar Hash</button>
        <button type="button" onclick="limpiarFormulario()">Limpiar</button>
    </form>

    <div id="hashOutput">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['password'])) {
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            echo "<h3>Hash generado:</h3>";
            echo "<p><strong>$hashed_password</strong></p>";
        }
        ?>
    </div>
</body>
</html>
