<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Mascotas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <!-- Agrega aquí tus enlaces a CSS y otras bibliotecas si es necesario -->
</head>
<body>

   <header class="header">
   <div class="menu container">
    <a href="#" class="logo">Vet Peluditos</a>
    <?php 
        session_start(); // Iniciar sesión
        if(isset($_SESSION['usuarios.nombre'])) {
            echo '<div class="welcome-msg">¡Bienvenido, ' . $_SESSION['usuarios.nombre'] . '!</div>';
        }
    ?>
    <input type="checkbox" id="menu"/>
    <label for="menu">
    <img src="images/menu.png" lcass="menu-icono" alt="menu">
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
   
   <main>
   <form method="post">
    <h2>VetPeluditos</h2>
    
    <p>Regístra tu mascota</p>

    <div class="input-wrapper">
        <input type="text" name="nom_mascota" placeholder="Nombre">
        <i class=""></i>
    </div>
    <div class="input-wrapper">
        <input type="text" name="tipo_mascota" placeholder="tipo">
        <i class=""></i>
    </div>    
    <div class="input-wrapper">
        <input type="text" name="raza" placeholder="raza">
        <i class=""></i>
    </div>  
    <input class="btn" type="submit" name="registro_mascota" value="Registrar">
    
    

</form>
   </main>

   <?php
   include("conexion.php");
// Verificar si se ha enviado el formulario
if(isset($_POST['registro_mascota'])) {
    $nom_mascota = $_POST['nom_mascota'];
    $tipo_mascota = $_POST['tipo_mascota'];
    $raza = $_POST['raza'];
   
    
    $errorRegistroMascota = []; // Array para almacenar mensajes de error
    if (empty($nom_mascota) || empty($tipo_mascota) || empty($raza)) {
        $errorRegistroMascota[] = "Todos los campos son obligatorios.";
    }

    if (empty($errorRegistroMascota)) {
        // Asignar rol de cliente por defecto
        $id_mascota = uniqid(); // Reemplazar con el valor del rol "cliente" en tu tabla roles
        $consultaMascota = "INSERT INTO mascota (id_mascota, nom_mascota, tipo_mascota, raza) VALUES ('$id_mascota', '$nom_mascota', '$tipo_mascota', '$raza')";
        $resultadoMascota = mysqli_query($conex, $consultaMascota);

        if ($resultadoMascota) {
            ?>
            <h3 class="success">Se ha registrado la mascota!</h3>
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
        foreach ($errorRegistroMascota as $errorMascota) {
            echo "<li>$errorMascota</li>";
        }
        echo '</ul>';
    }
}
  

    
    
?>


   <!-- Agrega aquí tus scripts JavaScript si es necesario -->
</body>
</html>