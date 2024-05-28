<?php
session_start();
$isLoggedIn = isset($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes VetPeluditos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminPanel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


</head>
<body>
<div class="menu container">
           <a href="#" class="logo">Vet Peluditos</a>
           <input type="checkbox" id="menu"/>
           <label for="menu">
               <img src="images/menu.png" class="menu-icono" alt="menu">
           </label>
           <nav class="navbar">
               <ul>
                   <?php if ($isLoggedIn): ?>
                       <li><a href="gestionarPaciente.php">Gestionar Paciente</a></li>
                       <li><a href="logout.php">Cerrar Sesión</a></li>
                   <?php else: ?>
                       <li><a href="login.php">Ingresar</a></li>
                   <?php endif; ?>
               </ul>
           </nav>
       </div>
<br>
<br>
    <h2 class="title">Lista de Pacientes</h2>
    <br>
    <div class="table-form">
    <table class="tabla" id="dataTable" border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>TIPO MASCOTA</th>
            <th>RAZA</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

    <?php
    include('conexion.php');

    $consulta = "SELECT mascota.id_mascota, mascota.nom_mascota, mascota.tipo_mascota, mascota.raza FROM mascota";
    $resultado = mysqli_query($conex, $consulta);

    // mostrar lista de usuarios

    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['id_mascota'] . "</td>";
        echo "<td>" . $fila['nom_mascota'] . "</td>";
        echo "<td>" . $fila['tipo_mascota'] . "</td>";
        echo "<td>" . $fila['raza'] . "</td>";
        echo '<td> 
        <a href="eliminarUsuario.php?id=' . $fila['id_mascota'] . '" class="btn-eliminar"><i class="fas fa-trash"></i> Eliminar</a> 
        </td>';
        
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