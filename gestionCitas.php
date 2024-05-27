<?php

session_start();
$isLoggedIn = isset($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Citas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="agregarVet.css">
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
            <li><a href="#">Inicio</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <?php if ($isLoggedIn): ?>
                <li><a href="registrar_mascota.php">Registrar mascota</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="login.php">Ingresar</a></li>
            <?php endif; ?>
    </ul>
        </nav>
    </div>
</header>

<main>
    <form method="post">
        <h2>Registrar Citas</h2>
        <p>Registra una cita para tu mascota</p>

        <div class="input-wrapper">
            <label for="id_mascota">Seleccione la mascota:</label>
            <select name="id_mascota" id="id_mascota">
                <?php
                include("conexion.php");
                $id = $_SESSION['id']; // Asumiendo que tienes el id del usuario en la sesión
                $queryMascotas = "SELECT id_mascota, nom_mascota FROM mascota WHERE id = '$id'";
                $resultMascotas = mysqli_query($conex, $queryMascotas);
                while ($rowMascota = mysqli_fetch_assoc($resultMascotas)) {
                    echo "<option value='" . $rowMascota['id_mascota'] . "'>" . $rowMascota['nom_mascota'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-wrapper">
            <label for="especialidad">Seleccione la especialidad:</label>
            <select name="especialidad" id="especialidad">
                <?php
                $queryEspecialidades = "SELECT id_especialidad, nombre_especialidad FROM especialidades";
                $resultEspecialidades = mysqli_query($conex, $queryEspecialidades);
                while ($rowEspecialidad = mysqli_fetch_assoc($resultEspecialidades)) {
                    echo "<option value='" . $rowEspecialidad['id_especialidad'] . "'>" . $rowEspecialidad['nombre_especialidad'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-wrapper">
            <label for="idVeterinario">Seleccione el veterinario:</label>
            <select name="idVeterinario" id="idVeterinario">
                <?php
                $queryVeterinarios = "SELECT idVeterinario, nombre FROM veterinario";
                $resultVeterinarios = mysqli_query($conex, $queryVeterinarios);
                while ($rowVeterinario = mysqli_fetch_assoc($resultVeterinarios)) {
                    echo "<option value='" . $rowVeterinario['idVeterinario'] . "'>" . $rowVeterinario['nombre'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-wrapper">
            <label for="fecha">Fecha de la cita:</label>
            <input type="date" name="fecha" id="fecha" required>
        </div>

        <div class="input-wrapper">
            <label for="hora">Hora de la cita:</label>
            <input type="time" name="hora" id="hora" required>
        </div>

        <input class="btn" type="submit" name="registro_cita" value="Registrar Cita">
    </form>
</main>

<?php
if (isset($_POST['registro_cita'])) {
    $id_mascota = $_POST['id_mascota'];
    $idVeterinario = $_POST['idVeterinario'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $queryCita = "INSERT INTO citas (id_mascota, idVeterinario, fecha, hora) VALUES ('$id_mascota', '$idVeterinario', '$fecha', '$hora')";
    $resultCita = mysqli_query($conex, $queryCita);

    if ($resultCita) {
        echo "<h3 class='success'>¡Cita registrada exitosamente!</h3>";
    } else {
        echo "<h3 class='error'>Ocurrió un error al registrar la cita.</h3>";
    }
}
?>

</body>
</html>
