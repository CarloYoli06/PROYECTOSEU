<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Actividades</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
// Establecer conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener las horas y días de las actividades
$sql = "SELECT DATE(FECHA) AS Dia, HOUR(HORARIO) AS Hora, COUNT(*) AS Cantidad 
        FROM actividad 
        WHERE FECHA = '2024-04-15' 
        GROUP BY Dia, Hora";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear una matriz para almacenar los resultados
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[$row["Dia"]][$row["Hora"]] = $row["Cantidad"];
    }
    
    // Imprimir la tabla HTML
    echo "<table>";
    echo "<tr><th>Día/Hora</th>";
    for ($i = 0; $i < 24; $i++) {
        echo "<th>$i:00</th>";
    }
    echo "</tr>";
    
    foreach ($data as $dia => $horas) {
        echo "<tr><td>$dia</td>";
        for ($i = 0; $i < 24; $i++) {
            echo "<td>" . ($horas[$i] ?? 0) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron actividades para la fecha especificada.";
}

$conn->close();
?>

</body>
</html>
