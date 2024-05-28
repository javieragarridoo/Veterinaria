<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro.css">
    <title>Formulario </title>
</head>
<body>

<form method="post">
    <h2>VetPeluditos</h2>
    <p>Registra a un Veterinario aquí</p>

    <div class="input-wrapper">
        <input type="text" name="nombre" placeholder="Nombre y Apellido">
        <i class="input-icon fa-solid fa-user"></i>
    </div>
    <div class="input-wrapper">
        <input type="email" name="email" placeholder="Correo electrónico">
        <i class="input-icon fa-solid fa-envelope"></i>
    </div>
    <div class="input-wrapper">
        <input type="tel" name="telefono" placeholder="Celular (912345678)">
        <i class="input-icon fa-solid fa-phone"></i>
    </div>
    <div class="input-wrapper">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <i class="input-icon fa-solid fa-key"></i>
    </div>
    <div class="select-wrapper">
        <select name="especialidad">
            <option value="">Selecciona una especialidad</option>
            <?php
            include('conexion.php');
            // Consulta para obtener las especialidades disponibles
            $consultaEspecialidades = "SELECT id_especialidad, nombre_especialidad FROM especialidades";
            $resultadoEspecialidades = mysqli_query($conex, $consultaEspecialidades);
            
            // Iterar sobre los resultados y generar opciones para el select
            while($row = mysqli_fetch_assoc($resultadoEspecialidades)) {
                echo "<option value='" . $row['id_especialidad'] . "'>" . $row['nombre_especialidad'] . "</option>";
            }
            ?>
        </select>
    </div>
    <input class="btn" type="submit" name="registrar" value="Registrarse">
</form>
    
</body>
</html>

<?php
include("conexion.php");

if(isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $id_especialidad = $_POST['especialidad'];

    // Validación de campos obligatorios
    $errorRegistro = []; // Array para almacenar mensajes de error
    if (empty($nombre) || empty($email) || empty($telefono) || empty($contraseña) || empty($id_especialidad)) {
        $errorRegistro[] = "Todos los campos son obligatorios.";
    }

    // Validación adicional (opcional)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorRegistro[] = "Correo electrónico no válido.";
    }
    if (strlen($contraseña) < 6) {
        $errorRegistro[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Si no hay errores de validación, registrar veterinario
    if (empty($errorRegistro)) {
        // Asignar rol de veterinario por defecto
        $rol = 2; // Reemplazar con el valor del rol "veterinario" en tu tabla roles

        $consulta = "INSERT INTO veterinario (nombre, email, telefono, contraseña, id_rol, id_especialidad) VALUES ('$nombre', '$email', '$telefono', '$contraseña', '$rol', '$id_especialidad')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            echo '<h3 class="success">Veterinario registrado exitosamente!</h3>';
        } else {
            echo '<h3 class="error">Ocurrió un error al registrar el veterinario.</h3>';
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
