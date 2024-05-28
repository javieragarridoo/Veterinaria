<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veterinario</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>

<?php
include('conexion.php');

if (isset($_GET['idVeterinario'])) {
    $idVeterinario = $_GET['idVeterinario'];
    $consulta = "SELECT * FROM veterinario WHERE idVeterinario = $idVeterinario";
    $resultado = mysqli_query($conex, $consulta);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre = $fila['nombre'];
        $email = $fila['email'];
        $telefono = $fila['telefono'];
        $id_especialidad = $fila['id_especialidad'];
    }
}

if (isset($_POST['actualizar'])) {
    $idVeterinario = $_POST['idVeterinario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $id_especialidad = $_POST['especialidad'];

    $consulta = "UPDATE veterinario SET nombre='$nombre', email='$email', telefono='$telefono', id_especialidad='$id_especialidad' WHERE idVeterinario='$idVeterinario'";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        echo '<h3 class="success">Veterinario actualizado exitosamente!</h3>';
        header("Location: adminPanel.php");
    } else {
        echo '<h3 class="error">Ocurrió un error al actualizar el veterinario: ' . mysqli_error($conex) . '</h3>';
    }
}
?>

<form method="post">
    <h2>VetPeluditos</h2>
    <p>Edita la información del Veterinario aquí</p>

    <input type="hidden" name="idVeterinario" value="<?php echo isset($idVeterinario) ? $idVeterinario : ''; ?>">

    <div class="input-wrapper">
        <input type="text" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" placeholder="Nombre y Apellido">
        <i class="input-icon fa-solid fa-user"></i>
    </div>
    <div class="input-wrapper">
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Correo electrónico">
        <i class="input-icon fa-solid fa-envelope"></i>
    </div>
    <div class="input-wrapper">
        <input type="tel" name="telefono" value="<?php echo isset($telefono) ? $telefono : ''; ?>" placeholder="Celular (912345678)">
        <i class="input-icon fa-solid fa-phone"></i>
    </div>
    <div class="select-wrapper">
        <select name="especialidad">
            <option value="">Selecciona una especialidad</option>
            <?php
            $consultaEspecialidades = "SELECT id_especialidad, nombre_especialidad FROM especialidades";
            $resultadoEspecialidades = mysqli_query($conex, $consultaEspecialidades);

            while($row = mysqli_fetch_assoc($resultadoEspecialidades)) {
                $selected = ($row['id_especialidad'] == $id_especialidad) ? "selected" : "";
                echo "<option value='" . $row['id_especialidad'] . "' $selected>" . $row['nombre_especialidad'] . "</option>";
            }
            ?>
        </select>
    </div>
    <input class="btn" type="submit" name="actualizar" value="Actualizar">
</form>

</body>
</html>
