<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Usuario";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        /* Estilos internos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container-fluid {
            margin-top: 20px;
        }

        .welcome-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 90%;
            margin: auto;
        }

        .welcome-box img {
            max-width: 100%;
            height: auto;
        }

        .logout-btn {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Menú de navegación con submenús -->


    <!-- Menú lateral de navegación -->
    <?php include 'src/assets/includes/navbar.php'; ?>



<!-- Contenido principal -->
<div class="container-fluid text-center">
    <div class="welcome-box">
        <h1 class="mb-4">Bienvenido al menú SEN, <strong><?php echo htmlspecialchars($user_name); ?></strong></h1>
        <img src="src/assets/img/imagenenvio01.jpeg" class="img-fluid rounded" alt="Imagen de fondo">
    </div>

    <div class="logout-btn">
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<p>Hora actual: <span id="hora"></span></p>



<script>
    // 🔹 Función para actualizar la hora en pantalla cada segundo
    function actualizarHora() {
        let ahora = new Date();
        let hora = ahora.toLocaleTimeString();
        let horaElemento = document.getElementById("hora");
        if (horaElemento) {
            horaElemento.textContent = hora;
        }
    }

    setInterval(actualizarHora, 1000);
    actualizarHora(); // Mostrar la hora al cargar

    // 🔹 Cerrar sesión después de 5 minutos de inactividad
    let tiempoInactivo = 0;
    let maxTiempo = 5 * 60; // 5 minutos en segundos

    function resetTimer() {
        tiempoInactivo = 0;
    }

    setInterval(() => {
        tiempoInactivo++;
        console.log("Tiempo inactivo:", tiempoInactivo); // Depuración
        if (tiempoInactivo >= maxTiempo) {
            window.location.href = "logout.php"; // Redirige al cerrar sesión
        }
    }, 1000);

    // Reiniciar el contador si el usuario interactúa
    ["mousemove", "keypress", "click", "scroll"].forEach(event => {
        document.addEventListener(event, resetTimer);
    });
</script>



</body>
</html>
