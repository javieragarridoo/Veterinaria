<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
</head>
<body>

<form method="post">
    <h2>VetPeluditos</h2>
    <p>Inicia sesión para acceder a tu cuenta</p>

    <div class="input-wrapper">
        <input type="email" name="email" placeholder="Correo Electrónico" required>
        <i class="input-icon fa-solid fa-envelope"></i>
    </div>
    <div class="input-wrapper">
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <i class="input-icon fa-solid fa-key"></i>
    </div>
    <input class="btn" type="submit" name="iniciarSesion" value="Iniciar Sesión">

    <a href="registro.php" class="btn-1">Registrarse</a>

</form>


<?php
include("conexion.php"); // Incluir la conexión a la base de datos

// Validar si se ha enviado el formulario
if (isset($_POST['iniciarSesion'])) {

    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Consulta para verificar el usuario por su correo electrónico
    $consulta = "SELECT id, nombre, email, contraseña, id_rol FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conex, $consulta);

    // Si la consulta devuelve un registro (usuario encontrado)
    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado); // Obtener datos del usuario

        // Verificar la contraseña utilizando password_verify
        if (password_verify($contraseña, $usuario['contraseña'])) {
            // Iniciar sesión utilizando variables de sesión
            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['id_rol'] = $usuario['id_rol']; // Almacenar el ID del rol

            // Redirigir a la página principal o según el rol del usuario
            if ($usuario['id_rol'] == 1) { // Administrador
                header("Location: admin.php");
            } else if ($usuario['id_rol'] == 2) { // Veterinario
                header("Location: veterinario.php");
            } else { // Cliente (por defecto)
                header("Location: index.php");
            }
            exit();
        } else {
            // Contraseña incorrecta
            echo '<h3 class="error">Credenciales incorrectas. Inténtalo de nuevo.</h3>';
        }
    } else {
        // Si no se encuentra el usuario, mostrar mensaje de error
        echo '<h3 class="error">Credenciales incorrectas. Inténtalo de nuevo.</h3>';
    }
}
?>

</body>
</html>
