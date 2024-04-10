<?php

function generateWeekTable() {
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
    echo '<td>Empleado</td>';

    $dt->modify('Monday this week');
    do {
        echo '<td>' . $dt->format('l') . '<br>' . $dt->format('d M Y') . '</td>';
        $dt->modify('+1 day');
    } while ($week == $dt->format('W'));

    echo '</tr>';
    echo '</table>';
}

// Llamar a la función para generar la tabla de la semana

?>
