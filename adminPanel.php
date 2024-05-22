<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarios VetPeluditos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminPanel.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <h2 class="title">Lista de Veterinarios</h2>
    <br>
    <a href="agregarVet.php" class="btn-crear">Agregar Veterinario</a>
    <br>
    <div class="table-form">
    <table class="tabla" id="dataTable" border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Especialidad</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

    <?php
    include('conexion.php');

    if (isset($_POST['eliminar'])) {
        $idVeterinario = $_POST['idVeterinario'];
        $consultaEliminar = "DELETE FROM veterinario WHERE idVeterinario = $idVeterinario";
        $resultadoEliminar = mysqli_query($conex, $consultaEliminar);

        if ($resultadoEliminar) {
            echo '<h3 class="success">Veterinario eliminado exitosamente!</h3>';
        } else {
            echo '<h3 class="error">Ocurrió un error al eliminar el veterinario: ' . mysqli_error($conex) . '</h3>';
        }
    }

    $consulta = "SELECT veterinario.idVeterinario, veterinario.nombre, veterinario.email, veterinario.telefono, especialidades.nombre_especialidad 
                 FROM veterinario
                 LEFT JOIN especialidades ON veterinario.id_especialidad = especialidades.id_especialidad";
    $resultado = mysqli_query($conex, $consulta);

    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['idVeterinario'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['email'] . "</td>";
        echo "<td>" . $fila['telefono'] . "</td>";
        echo "<td>" . $fila['nombre_especialidad'] . "</td>";
        echo '<td>

              <a href="editarVet.php?idVeterinario=' . $fila['idVeterinario'] . '" class="btn-editar"><i class="fas fa-edit"></i> Editar</a>
              <form method="post" style="display:inline;" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este veterinario?\');">
                  <input type="hidden" name="idVeterinario" value="' . $fila['idVeterinario'] . '">
                  <button type="submit" name="eliminar" class="btn-eliminar"><i class="fas fa-trash"></i> Eliminar</button>
              </form>
              </td>';
        echo "</tr>";
    }
    ?>
    </tbody>
    </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sSearch":         "Buscar:",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
        });

        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>
</html>
