<?php
include 'conexion.php';

// Obtener datos enviados por AJAX
$id_actividad = $_POST['idact'];
$id_estudiante = $_POST['codigo'];

// Consulta para verificar si el estudiante está asignado a la actividad
$sql = "SELECT * FROM alumnos_actividad WHERE id_EVENTO = $id_actividad AND noCtrl = '$id_estudiante'";
$result = mysqli_query($conexion, $sql);

if ($result->num_rows > 0) {
    // El estudiante está asignado a la actividad, verificar su asistencia
    $row = mysqli_fetch_assoc($result);
    if ($row['ASISTENCIA'] == '0') {
        // El estudiante no tiene registrada su asistencia, actualizar a asistencia = 1
        $update_sql = "UPDATE alumnos_actividad SET ASISTENCIA = 1 WHERE id_evento = $id_actividad AND noCtrl = '$id_estudiante'";
        if (mysqli_query($conexion, $update_sql)) {
            echo 'Asistencia registrada correctamente.';
        } else {
            echo 'Error al actualizar la asistencia: " . mysqli_error($conexion) . "';
        }
    } else {
        // El estudiante ya tiene registrada su asistencia
        echo 'El estudiante ya tiene registrada su asistencia.';
    }
} else {
    // El estudiante no está asignado a la actividad
    echo 'El estudiante no está asignado a esta actividad.';
}

mysqli_close($conexion);
?>
