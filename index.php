<?php
session_start();
$isLoggedIn = isset($_SESSION['id']);
?>

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
           <input type="checkbox" id="menu"/>
           <label for="menu">
               <img src="images/menu.png" class="menu-icono" alt="menu">
           </label>
           <nav class="navbar">
               <ul>
                   <li><a href="#">Inicio</a></li>
                   <li><a href="nosotros.php">Nosotros</a></li>
                   <li><a href="servicios.php">Servicios</a></li>
                   <?php if ($isLoggedIn): ?>
                       <li><a href="registrar_mascota.php">Registrar mascota</a></li>
                       <li><a href="agendar_consulta.php">Agendar Consulta</a></li>
                       <li><a href="logout.php">Cerrar Sesión</a></li>
                   <?php else: ?>
                       <li><a href="login.php">Ingresar</a></li>
                   <?php endif; ?>
               </ul>
           </nav>
       </div>

   <div class="header-content container">

           <!-- Banner promocional LovPets -->
           <div class="banner-lovpets">
                    <a href="https://lovpets.org" target="_blank">
                        <img src="images/lovpets.jpg" alt="LovPets Fundación">
                        <div class="banner-text">Apoya a LovPets, la fundación que cuida de los animales sin hogar, obtendras descuentos y beneficios si te suscribes o adoptas a un animal, juntos por nuestros amigos peludos. <strong>Haz clic aquí para más información.</strong></div>
                    </a>
                </div>
           <div class="header-txt">

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

    <section class="about container">
        <div class="about-img">
            <img src="images/cenvet.jpg" alt="">
        </div>
        <div class="about-txt">
            <h2>Nosotros</h2>
            <p>
            En Vet Peluditos, nuestro mayor compromiso es la salud y el bienestar de tu mascota. Somos un equipo de profesionales apasionados por los animales, que creemos que cada peludito merece recibir la mejor atención posible.
            </p>
            <br>
            <a href="nosotros.php" class="btn-1">Ver más</a>
           <!-- <br>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates eius, ducimus aspernatur rerum soluta deleniti. Reprehenderit dicta dignissimos debitis accusantium. Quasi fuga, dolorem nesciunt tempore culpa beatae odio! Fuga, reiciendis!
            </p> -->
        </div>
    </section>

    <main class="servicios">
        <h2>Servicios</h2>
        <div class="servicios-content container">
            <div class="servicio-1">
                <i class="fa-sharp fa-solid fa-user-md"></i>
                <h3>Consulta Medica</h3>
            </div>
            <div class="servicio-1">
                <i class="fa-sharp fa-solid fa-stethoscope"></i>
                <h3>Cirugias</h3>
            </div>

            <div class="servicio-1">
                <i class="fa-sharp fa-solid fa-syringe"></i>
                <h3>Medicina Preventiva</h3>
            </div>
            <div class="servicio-1">
                <i class="fa-sharp fa-solid fa-scissors"></i>
                <h3>Peluqueria Canina</h3>
            </div>
            <div class="servicio-1">
                <i class="fa-sharp fa-solid fa-paw"></i>
                <h3>Implantacion de Chip</h3>
            </div>
        </div>
    </main>

    <section class="formulario container">
        
        <form method="post" autocomplete="off">

        <h2>Contáctanos</h2>

        <div class="input-group">
            <div class="input-container">
                <input type="text" name="name" placeholder="Nombre y Apellido">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-container">
                <input type="tel" name="phone" placeholder="Telefono">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="Correo">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-container">
                <textarea name="message" placeholder="Detalles de la consulta"></textarea>
            </div>

            <input type="submit" name="send" class="btn" onclick="myFunction()">

        </div>
    </form>
    </section>

    <footer class="footer">

        <div class="footer-content container">
            <div class="link">
                <a href="#" class="logo">CENTRO VETERINARIO</a>
            </div>

            <div class="link">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="servicios.php">Servicios</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </div>

        </div>

    </footer>

    <?php
        include("send.php");
    ?>

    <script>
        function myFunction(){
            window.location.href="http://localhost/Veterinaria"
        }
    </script>

</body>
</html>