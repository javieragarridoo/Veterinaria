<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Olvidaste tu contraseña? - Vet Peluditos</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <style>.header-small {
    padding: 50px 0; /* Ajuste el padding según sea necesario */
    min-height: 20vh; /* Ajuste la altura mínima según sea necesario */
} </style>

    <main class="main-content container">
    <form method="post">
    <h2>Recuperar Contraseña</h2>
    <p>Ingresa tu Correo Electrónico</p>

    <div class="input-wrapper">
        <input type="email" name="email" placeholder="Correo Electrónico" required>
        <i class="input-icon fa-solid fa-envelope"></i>
    </div>
    <input class="btn" type="submit" name="recuperarPass" value="Enviar">
    <a href="login.php" class="btn-1">Ir atrás</a>


</form>
    </main>

    <footer class="footer">
        <!-- Contenido del pie de página -->
    </footer>

    <script>
        function myFunction(){
            window.location.href="http://localhost/Veterinaria";
        }
    </script>
</body>
</html>
