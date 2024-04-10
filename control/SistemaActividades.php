<?php

function generateWeekTable($conn) {
    // Definir los nombres de los días de la semana en español
    $dias_semana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

    // Definir los nombres de los meses en español
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

    // Definir las horas del día
    $horas = array('00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00');

    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year = $dt->format('o');
    $week = $dt->format('W');

    echo '<a href="' . $_SERVER['PHP_SELF'] . '?week=' . ($week - 1) . '&year=' . $year . '">Semana Anterior</a>'; // Semana anterior
    echo '<a href="' . $_SERVER['PHP_SELF'] . '?week=' . ($week + 1) . '&year=' . $year . '">Próxima Semana</a>'; // Próxima semana

    echo '<table border="1">';
    echo '<tr>';
    echo '<th></th>'; // Celda vacía para la esquina superior izquierda

    // Generar los encabezados de columna para los días de la semana en español
    $dt->modify('Monday this week');
    do {
        echo '<th>' . $dias_semana[$dt->format('N') - 1] . '<br>' . $dt->format('d') . ' ' . $meses[$dt->format('n') - 1] . '</th>';
        $dt->modify('+1 day');
    } while ($week == $dt->format('W'));
    echo '</tr>';

    // Generar las filas para las horas del día
    foreach ($horas as $hora) {
        echo '<tr>';
        echo '<th>' . $hora . '</th>'; // Encabezado de fila con la hora
        // Generar las celdas para cada día de la semana
        $dt->modify('Monday this week');
        do {
            echo '<td>'; // Celda para la actividad
            // Realizar consulta para obtener eventos en esta hora y día
            $fecha = $dt->format('Y-m-d') . ' ' . $hora;
            $sql = "SELECT * FROM actividad WHERE HORARIO = '$fecha'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Mostrar los eventos encontrados
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['NOMBRE'] . '<br>';
                }
            }
            echo '</td>';
            $dt->modify('+1 day');
        } while ($week == $dt->format('W'));
        echo '</tr>';
    }

    echo '</table>';
}

// Llamar a la función para generar la tabla de la semana

?>
