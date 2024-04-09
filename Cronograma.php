<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Cronograma de Actividades</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Pcontent.css">
</head>
<body>

<div class="p-3 mb-2 bg-warning text-warning-emphasis d-flex justify-content-between align-items-center">
    <!-- Columna izquierda para el menú desplegable -->
    
    <div class="col">
        <div class="btn-group">
            <button style="background-color: #FF6104; color: white; border-color: #FF6104;" 
            type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Opciones
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li><button class="dropdown-item" type="button">Another action</button></li>
                <li><button class="dropdown-item" type="button">Something else here</button></li>
            </ul>
        </div>
    </div>

    <!-- Columna central para el título -->
    <div class="col">
        <div id="tituloPer">
            <h2>Cronograma de actividades</h2>
        </div>
        
    </div>

    <!-- Columna derecha para el botón -->
    <div class="col">
        <div class="d-flex justify-content-end">
            <button id="verEventos" class="btn btn-primary" style="background-color: #FF6104; color: white; border-color: #FF6104;">Ver Eventos</button>
        </div>
    </div>
</div>

<div id="table-container" class="container-fluid">
    <table id="tablaActividades" class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th></th>
                <?php
                // Generar las horas del día como encabezados de columna en formato de hora
                for ($hora = 6; $hora <= 22; $hora++) {
                    // Convertir la hora al formato de 12 horas (AM/PM)
                    $hora_formato = ($hora < 12) ? "$hora AM" : (($hora == 12) ? "12 PM" : ($hora - 12) . " PM");
                    echo "<th>$hora_formato</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            include("conexion.php");
            // Definir la semana actual y obtener el primer día de la semana
            $semana_actual = date('W');
            $fecha_inicio_semana = date('Y-m-d', strtotime(date('Y')."W".$semana_actual));
            
            // Función para obtener las actividades de una fecha y hora específicas
            function obtenerActividades($fecha, $hora, $conexion) {
                // Formatear la fecha y hora para la consulta SQL
                $fechaHora = $fecha . ' ' . $hora . ':00:00';
            
                // Consulta SQL para obtener las actividades en la fecha y hora especificadas
                $consulta = "SELECT NOMBRE FROM actividad WHERE FECHA = '$fecha' AND HOUR(HORARIO) = '$hora'";
                $resultado = mysqli_query($conexion, $consulta);
            
                // Array para almacenar los nombres de las actividades
                $actividades = array();
            
                // Recorrer el resultado de la consulta y almacenar los nombres de las actividades
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $actividades[] = $fila['NOMBRE'];
                }
            
                return $actividades;
            }
            
            // Generar las filas de la tabla para cada día de la semana
            for ($dia = 0; $dia < 7; $dia++) {
                $fecha = date('Y-m-d', strtotime($fecha_inicio_semana . " +$dia day"));
                echo "<tr>";
                echo "<td>$fecha</td>";
                // Generar celdas para cada hora del día
                for ($hora = 6; $hora <= 22; $hora++) {
                    echo "<td>";
                    // Obtener las actividades de la fecha y hora actual
                    $actividades = obtenerActividades($fecha, $hora, $conexion);
                    // Mostrar las actividades en la celda
                    foreach ($actividades as $actividad) {
                        echo $actividad . "<br>";
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Agregar controles de navegación por semana -->
<div class="container-fluid mt-3">
    <div class="d-flex justify-content-center">
        <button id="anteriorSemana" class="btn btn-secondary">Semana Anterior</button>
        <button id="siguienteSemana" class="btn btn-secondary ml-2">Siguiente Semana</button>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    // Variable global para almacenar la fecha de inicio de la semana actual
    var fechaInicioSemana = new Date();

    // Función para actualizar la tabla con la nueva semana
    function actualizarTabla() {
        var tabla = document.getElementById('tablaActividades').getElementsByTagName('tbody')[0];
        var fechaInicio = new Date(fechaInicioSemana);
        
        // Recorrer cada fila de la tabla
        for (var i = 0; i < 7; i++) {
            var fila = tabla.rows[i];
            var fecha = new Date(fechaInicio);
            fecha.setDate(fechaInicio.getDate() + i); // Añadir el día correspondiente de la semana

            // Actualizar la primera columna con la fecha
            fila.cells[0].innerHTML = fecha.toISOString().split('T')[0]; // Formatear la fecha YYYY-MM-DD

            // Si necesitas más personalización del formato de fecha, puedes usar métodos de Date o librerías como Moment.js
        }
    }

    // Event listener para el botón "Semana Anterior"
    document.getElementById('anteriorSemana').addEventListener('click', function() {
        fechaInicioSemana.setDate(fechaInicioSemana.getDate() - 7); // Retroceder 7 días
        actualizarTabla();
    });

    // Event listener para el botón "Siguiente Semana"
    document.getElementById('siguienteSemana').addEventListener('click', function() {
        fechaInicioSemana.setDate(fechaInicioSemana.getDate() + 7); // Avanzar 7 días
        actualizarTabla();
    });

    // Llamada inicial para mostrar la semana actual
    actualizarTabla();
</script>
<?php include("conexion.php");?>
</body
</html>
