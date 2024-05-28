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
    <img src="images/menu.png" lcass="menu-icono" alt="menu">
</label>
<nav class="navbar">
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="nosotros.php">Nosotros</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="login.php">Ingresar</a></li>
        <li><a href="#" id="logoutButton">Salir</a></li> </ul>
        
    </ul>
</nav>
   </div>

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