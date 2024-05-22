<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="vetPerfil.css">
</head>
<body>

<header class="header">
   <div class="menu container">
    <a href="index.php" class="logo">Vet Peluditos</a>
    <input type="checkbox" id="menu"/>
    <label for="menu">
    <img src="images/menu.png" lcass="menu-icono" alt="menu">
</label>
   </div>
   <div class="header-content container">
   </div>
</header>

<form method="post">
    <h2>VetPeluditos</h2>
    <p>Bienvenido !</p>
<br>
    <div class="input-wrapper">
    <a href="gestionCitas.php" class="btn-1">Gestion de citas</a>
    </div>
    <div class="input-wrapper">
    <a href="historialConsulta.php" class="btn-1">Historial de consultas</a>
    </div>
    <div class="input-wrapper">
    <a href="gestionPaciente.php" class="btn-1">Gestionar paciente</a>
    </div>
    <div class="input-wrapper">
    <a href="index.php" class="btn-1">Cerrar sesion</a>
    </div>
</form>
</body>
</html>