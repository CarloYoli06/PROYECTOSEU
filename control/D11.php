<?php
// Incluir archivo de conexión a la base de datos
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";

if(isset($_GET['id'])) {
    // Sanitizar el ID de la actividad
    $idActividad = mysqli_real_escape_string($conexion, $_GET['id']);

    // Realizar la consulta para obtener los detalles de la actividad
    $query = "SELECT * FROM actividad WHERE id_ACTIVIDAD = $idActividad";
    $result = mysqli_query($conexion, $query);
    

    if($result && mysqli_num_rows($result) > 0) {
        // Obtener los detalles de la actividad
        $row = mysqli_fetch_object($result);
        $e=$row->Expositor_idExpositor;
        $sql="SELECT * FROM expositor WHERE idExpositor=$e";
        $r=mysqli_query($conexion, $sql);
        $dato=mysqli_fetch_object($r);;
        // Crear un array con los detalles de la actividad
        $detalleActividad = array(
            'NOMBRE' => $row->NOMBRE,  
            'DESCRIPCION' => $row->DESCRIPCION,
            'HORARIO' => $row->HORARIO,
            'CAPACIDAD' => $row->CAPACIDAD,
            'CARRERA' => $row->CARRERA,
            'LUGAR' => $row->LUGAR,
            'NOMEX' => $dato->Nombre,
            'INS' => $dato->Instagram,
            'FACE' => $dato->Facebook,
            'TEL' => $dato->Telefono,
            'LINK' => $dato->LinkedIn
            // Agrega más campos si es necesario
        );

        // Devolver los detalles de la actividad en formato JSON
        echo json_encode($detalleActividad);
    } else {
        // No se encontraron detalles de la actividad
        echo json_encode(array('error' => 'No se encontraron detalles de la actividad'));
    }
} else {
    // No se proporcionó el ID de la actividad
    echo json_encode(array('error' => 'No se proporcionó el ID de la actividad'));
}
//echo json_encode($data); // Agrega esta línea al final del script

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>
