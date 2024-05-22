<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    
<form method="post">
    <h2>VetPeluditos</h2>
    
    <p>Regístrate aquí</p>

    <div class="input-wrapper">
        <input type="text" name="nombre" placeholder="Nombre y Apellido">
        <i class="input-icon fa-solid fa-user"></i>
    </div>
    <div class="input-wrapper">
        <input type="email" name="email" placeholder="Correo Electrónico">
        <i class="input-icon fa-solid fa-envelope"></i>
    </div>    
    <div class="input-wrapper">
        <input type="tel" name="telefono" placeholder="Celular (91234568)">
        <i class="input-icon fa-solid fa-phone"></i>
    </div>
    </div>   
     <div class="input-wrapper">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <i class="input-icon fa-solid fa-key"></i>
    </div>
    <input class="btn" type="submit" name="registrar" value="Registrarse">
    
    <a href="index.php" class="btn-1">Volver Atrás</a>

</form>


<?php
include("conexion.php");

if(isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    // Validación de campos obligatorios
    $errorRegistro = []; // Array para almacenar mensajes de error
    if (empty($nombre) || empty($email) || empty($telefono) || empty($contraseña)) {
        $errorRegistro[] = "Todos los campos son obligatorios.";
    }

    // Validación adicional (opcional)
    // ... (implementar validaciones adicionales como se explicó anteriormente)

    // Si no hay errores de validación, registrar usuario
    if (empty($errorRegistro)) {
        // Asignar rol de cliente por defecto
        $rol = 3; // Reemplazar con el valor del rol "cliente" en tu tabla roles

        $consulta = "INSERT INTO usuarios (nombre, email, telefono, contraseña, id_rol) VALUES ('$nombre', '$email', '$telefono', '$contraseña', '$rol')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            ?>
            <h3 class="success">Te has registrado exitosamente!</h3>
            <?php
        } else {
            ?>
            <h3 class="error">Ocurrió un error</h3>
            <?php
            /*
            if ($resultado) {
                echo "¡Usuario registrado correctamente!";
            } else {
                echo "Error al registrar usuario: " . mysqli_error($conex);
            }
            */
        }
    } else {
        // Mostrar mensajes de error
        echo '<ul class="errores">';
        foreach ($errorRegistro as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
    }
}
?>


