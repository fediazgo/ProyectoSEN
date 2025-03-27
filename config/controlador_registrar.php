<?php
if (!empty($_POST["Registro"])) {
    if (empty($_POST["nombre"]) || empty($_POST["Apellido"]) || empty($_POST["usuario"]) || empty($_POST["email"]) || empty($_POST["Contraseña"])) {
        echo "Por favor complete todos los campos";
    } else {
        $nombre = $_POST["nombre"];
        $Apellido = $_POST["Apellido"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $Contraseña = $_POST["Contraseña"];
        $role = $_POST["role"];
        $sql = "INSERT INTO usuarios (nombre, Apellido, usuario, email, Contraseña, role) VALUES ('$nombre', '$Apellido', '$usuario', '$email', '$Contraseña', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo "Usuario registrado con éxito";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

} 
?>


