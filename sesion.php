<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
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
        <li><a href="#">Inicio</a></li>
        <li><a href="nosotros.php">Nosotros</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="registrar_mascota.php">Registrar Mascota</a></li>
    </ul>
</nav>
   </div>

   <div class="header-content container">
    <div class="header-txt">
        <h1> CENTRO VETERINARIO </h1>
        <p>
¡Bienvenido a Vet Peluditos, el hogar del bienestar y la alegría de tu mejor amigo!

Comprendemos que tu mascota es parte de tu familia. Por eso, nos apasiona ofrecer una atención veterinaria integral y de alta calidad, con un enfoque en el amor y el cuidado.
        </p>
        <a href="nosotros.php" class="btn-1">informacion</a>
    </div>
    <div class="header-img">
        <img src="images/veterinario.webp" alt="">
    </div>
   </div>
</header>
...
</body>
</html>