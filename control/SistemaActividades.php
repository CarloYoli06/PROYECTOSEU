<?php
echo '<link rel="stylesheet" href="Pcontent.css">';


function generateWeekTable($conn) {
    //Validar por usuario
        $id_usuario =  $_SESSION['id_usuario'];
        $nombre=$_SESSION['nombre_usuario'];
    // Definir los nombres de los días de la semana en español
    $dias_semana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

    // Definir los nombres de los meses en español
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

    // Definir las horas del día
    $horas = array('07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00');
    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year = $dt->format('o');
    $week = $dt->format('W');

    echo '<form method="GET" action="' . $_SERVER['PHP_SELF'] . '">';
    echo '<input type="hidden" name="year" value="' . $year . '">';
    echo '<input type="hidden" name="week" value="' . ($week - 1) . '">';
    echo '<button type="submit" id="SemanaAnterior">Semana Anterior</button>';
    echo '</form>';
    
    echo '<form method="GET" action="' . $_SERVER['PHP_SELF'] . '">';
    echo '<input type="hidden" name="year" value="' . $year . '">';
    echo '<input type="hidden" name="week" value="' . ($week + 1) . '">';
    echo '<button type="submit"  id="SemanaProxima">Próxima Semana</button>';
    echo '</form>';

    echo '<table border="1"  style="width: 100%; border-collapse: border-color: transparent;">';
    echo '<tr style="border-color: transparent;">';
    echo '<th style="border: 1px solid black; padding: 8px;  text-align: center;border-color: transparent;"></th>'; // Celda vacía para la esquina superior izquierda
    $id_actividad=0 ;
    // Generar los encabezados de columna para los días de la semana en español
    $clone_dt = clone $dt;
    $clone_dt->modify('Monday this week');
    do {
        echo '<th style="border-color: transparent;font-size: 20px">' . $dias_semana[$clone_dt->format('N') - 1] . '<br>' . $clone_dt->format('d') . ' ' . $meses[$clone_dt->format('n') - 1] . '</th >';
        $clone_dt->modify('+1 day');
    } while ($week == $clone_dt->format('W'));
    echo '</tr>';

    // Array para almacenar los IDs de las actividades
        $ids_actividades = array();
        $id_actividad="";
        // Generar las filas para las horas del día
        foreach ($horas as $hora) {
            $colores_predefinidos = array('#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#FF00FF', '#00FFFF');
            echo '<tr  style="border-color: transparent;">';
            echo '<th style="border-color: transparent;font-size: 20px;min-heght:100px;">' . $hora . '</th>'; // Encabezado de fila con la hora
            // Generar las celdas para cada día de la semana
            $clone_dt = clone $dt;
            $clone_dt->modify('Monday this week');
            do {
                // Realizar consulta para obtener eventos en esta hora y día
                $fecha = $clone_dt->format('Y-m-d') . ' ' . $hora;
                $sql = "SELECT * FROM actividad a inner join alumnos_actividad al on (a.id_actividad= al.id_EVENTO) WHERE HORARIO = '$fecha' and al.noCtrl = '$id_usuario'";
                $result = mysqli_query($conn, $sql);
        
                // Verificar si se encontraron eventos
                if (mysqli_num_rows($result) > 0) {
                    // Mostrar los eventos encontrados
                    $color_index = array_rand($colores_predefinidos);
                    $random_color = $colores_predefinidos[$color_index];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id_actividad = $row['id_ACTIVIDAD']; // Obtener el ID de la actividad
                        echo '<td class="evento-celda" style="background-color: ' . $random_color . '; font-weight: bold;color: white;min-heght:100px;" data-id="' . intval($id_actividad) . '">';// Celda para el evento
                        echo $row['NOMBRE'] . '<br>';
                        // Almacenar el ID de la actividad en el array
                        $ids_actividades[] = $id_actividad;
                        echo '</td>';
                    }
                } else {
                    // Si no se encontraron eventos, imprimir una celda normal
                    echo '<td class="otra-clase" ></td>';
                }
                $clone_dt->modify('+1 day');
            } while ($week == $clone_dt->format('W'));
            echo '</tr>';
        }

    echo '</table>';
}
?>
