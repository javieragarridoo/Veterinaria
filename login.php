<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <a href="forgot.php" class="btn-1">¿Olvidaste tu contraseña?</a>
    <a href="registro.php" class="btn-1">Registrarse</a>

</form>

<?php
include("conexion.php"); // Incluir la conexión a la base de datos

// Función para validar la contraseña y manejar la sesión
function iniciarSesion($usuario, $rol, $redirectPage, $idColumn) {
    session_start();
    $_SESSION['id'] = $usuario[$idColumn];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['id_rol'] = $rol;
    header("Location: $redirectPage");
    exit();
}

// Validar si se ha enviado el formulario
if (isset($_POST['iniciarSesion'])) {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Consulta para verificar el usuario en ambas tablas
    $consultaUsuarios = "SELECT id, nombre, email, contraseña, id_rol FROM usuarios WHERE email = '$email'";
    $resultadoUsuarios = mysqli_query($conex, $consultaUsuarios);

    if (!$resultadoUsuarios) {
        echo '<h3 class="error">Error en la consulta de usuarios: ' . mysqli_error($conex) . '</h3>';
    }

    $consultaVeterinarios = "SELECT idVeterinario AS id, nombre, email, contraseña, id_rol FROM veterinario WHERE email = '$email'";
    $resultadoVeterinarios = mysqli_query($conex, $consultaVeterinarios);

    if (!$resultadoVeterinarios) {
        echo '<h3 class="error">Error en la consulta de veterinarios: ' . mysqli_error($conex) . '</h3>';
    }

    if (mysqli_num_rows($resultadoUsuarios) == 1) {
        $usuario = mysqli_fetch_assoc($resultadoUsuarios);
        if (password_verify($contraseña, $usuario['contraseña'])) {
            if ($usuario['id_rol'] == 1) { // Administrador
                iniciarSesion($usuario, $usuario['id_rol'], 'admin.php', 'id');
            } else if ($usuario['id_rol'] == 3) { // Cliente
                iniciarSesion($usuario, $usuario['id_rol'], 'index.php', 'id');
            } else {
                echo '<h3 class="error">Rol no reconocido. Contacta al administrador.</h3>';
            }
        } else {
            echo '<h3 class="error">Contraseña incorrecta. Inténtalo de nuevo.</h3>';
        }
    } elseif (mysqli_num_rows($resultadoVeterinarios) == 1) {
        $veterinario = mysqli_fetch_assoc($resultadoVeterinarios);
        if (password_verify($contraseña, $veterinario['contraseña'])) {
            iniciarSesion($veterinario, $veterinario['id_rol'], 'GestionPaciente.php', 'id');
        } else {
            echo '<h3 class="error">Contraseña incorrecta. Inténtalo de nuevo.</h3>';
        }
    } else {
        echo '<h3 class="error">Credenciales incorrectas. Inténtalo de nuevo.</h3>';
    }
}
?>

</body>
</html>
