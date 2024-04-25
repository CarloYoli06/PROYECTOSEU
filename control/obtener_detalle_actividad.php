<?php
include("../control/conexion.php");

// Verifica si se proporcionó un ID de actividad en la solicitud
if (isset($_GET['id'])) {
    $idActividad = $_GET['id'];
    // Realiza una consulta para obtener los detalles de la actividad según el ID proporcionado
    $sql = "SELECT * FROM actividad WHERE id_ACTIVIDAD = $idActividad";
    $result = mysqli_query($conexion, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Devuelve los detalles de la actividad como JSON
        $IDEXP=$row['Expositor_idExpositor'];

        $sql = "SELECT * FROM expositor WHERE idExpositor = $IDEXP";
        $result3 = mysqli_query($conexion, $sql);
        $row2 = mysqli_fetch_assoc($result3);



        echo json_encode([
            'NOMBRE' => $row['NOMBRE'],
            'DESCRIPCION' => $row['DESCRIPCION'],
            'LUGAR' => $row['LUGAR'],
            'FECHA' => $row['FECHA'],
            'HORARIO' => $row['HORARIO'],
            'CAPACIDAD' => $row['CAPACIDAD'],
            'INSCRITOS' => $row['ASISTENCIA'],
            'CARRERA' => $row['CARRERA'],

            'NombreExp' => $row2['Nombre'],
            'TELEFONO' => $row2['Telefono'],
            'FACEBOOK' => $row2['Facebook'],
            'INSTAGRAM' => $row2['Instagram'],
            'LINKEDIN' => $row2['LinkedIn'],
        ]); 

    } else {
        // Si no se encuentra la actividad, devuelve un mensaje de error
        echo json_encode(['error' => 'Actividad no encontrada']);
    }
} else {
    // Si no se proporcionó un ID de actividad, devuelve un mensaje de error
    echo json_encode(['error' => 'ID de actividad no proporcionado']);
}
?>
