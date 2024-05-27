<?php

session_start();
$isLoggedIn = isset($_SESSION['id']);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Mascotas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
   <div class="menu container">
    <a href="#" class="logo">Vet Peluditos</a>

    <input type="checkbox" id="menu"/>
    <label for="menu">
    <img src="images/menu.png" class="menu-icono" alt="menu">
    </label>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="registrar_mascota.php">Registrar Mascota</a></li>
        </ul>
    </nav>
   </div>
</header>

<main>
   <form method="post">
    <h2>VetPeluditos</h2>
    
    <p>Regístra tu mascota</p>

    <div class="input-wrapper">
        <input type="text" name="nom_mascota" placeholder="Nombre" required>
    </div>
    <div class="input-wrapper">
        <input type="text" name="tipo_mascota" placeholder="Tipo" required>
    </div>    
    <div class="input-wrapper">
        <input type="text" name="raza" placeholder="Raza" required>
    </div>  
    <input class="btn" type="submit" name="registro_mascota" value="Registrar">
   </form>
</main>

<?php
include("conexion.php");

/* Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
} */

// Verificar si se ha enviado el formulario
if (isset($_POST['registro_mascota'])) {
    $nom_mascota = $_POST['nom_mascota'];
    $tipo_mascota = $_POST['tipo_mascota'];
    $raza = $_POST['raza'];
    $id = $_SESSION['id']; // Obtener el id del usuario de la sesión

    $errorRegistroMascota = []; // Array para almacenar mensajes de error
    if (empty($nom_mascota) || empty($tipo_mascota) || empty($raza)) {
        $errorRegistroMascota[] = "Todos los campos son obligatorios.";
    }

    if (empty($errorRegistroMascota)) {
        // Asignar un ID único a la mascota
        $id_mascota = uniqid();
        $consultaMascota = "INSERT INTO mascota (id_mascota, nom_mascota, tipo_mascota, raza, id) VALUES ('$id_mascota', '$nom_mascota', '$tipo_mascota', '$raza', '$id')";
        $resultadoMascota = mysqli_query($conex, $consultaMascota);

        if ($resultadoMascota) {
            echo "<h3 class='success'>¡Se ha registrado la mascota!</h3>";
        } else {
            echo "<h3 class='error'>Ocurrió un error al registrar la mascota.</h3>";
        }
    } else {
        // Mostrar mensajes de error
        echo '<ul class="errores">';
        foreach ($errorRegistroMascota as $errorMascota) {
            echo "<li>$errorMascota</li>";
        }
        echo '</ul>';
    }
}
?>

</body>
</html>
