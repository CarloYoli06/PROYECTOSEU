<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendario Semanal</title>
</head>
<body>

<?php


$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');
?>

<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Semana Anterior</a> <!--Semana anterior-->
<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Próxima Semana</a> <!--Próxima semana-->

<table border="1">
    <tr>
        <td>Empleado</td>
<?php
$dt->modify('Monday this week');
do {
    echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
    $dt->modify('+1 day');
} while ($week == $dt->format('W'));


?>
    </tr>
</table>

</body>
</html>
