<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';



if (isset($_POST['idActividad']) && isset($_POST['calificacion']) ) {
    // Obtener los datos enviados por AJAX
    $idActividad = $_POST['idActividad'];
    $calificacion = $_POST['calificacion'];
    $idUsuario = $_POST['idUsuario'];
    // Actualizar la calificación en la tabla alumnos_actividad
    $consulta = "UPDATE alumnos_actividad SET cantidad_Estrellas = $calificacion WHERE id_EVENTO = $idActividad AND $idUsuario=noCtrl";
    if ($conexion->query($consulta) === TRUE) {
        echo "Calificación actualizada con éxito";
    } else {
        echo "Error al actualizar la calificación: " . $conexion->error;
    }
}

// Verificar si se recibió el ID del usuario
if (isset($_GET['idUsuario'])) {
    // Obtener el ID del usuario
    $idUsuario = $_GET['idUsuario'];
    $consulta="";
    // Definir la consulta base
    $consulta = "SELECT a.*, aa.cantidad_Estrellas
                 FROM actividad a
                 INNER JOIN alumnos_actividad aa ON a.id_ACTIVIDAD = aa.id_EVENTO 
                 WHERE aa.noCtrl = '$idUsuario' AND aa.ASISTENCIA = 1 AND aa.cantidad_Estrellas = 0";

    // Verificar si se recibió la carrera como parámetro
    if (isset($_GET['nombre_actividad']) && !empty($_GET['nombre_actividad'])) {
        $nombreActividad = $_GET['nombre_actividad'];
        // Agregar filtro de nombre de actividad a la consulta
        $consulta .= " AND a.NOMBRE LIKE '%$nombreActividad%'";
    }

    // Verificar si se recibió el nombre de la actividad como parámetro
    if (isset($_GET['carrera']) && !empty($_GET['carrera'])) {
        $carrera = $_GET['carrera'];
        // Agregar filtro de carrera a la consulta
        $consulta .= " AND a.CARRERA = '$carrera'";
    }

    // Realizar la consulta a la base de datos
    $resultado = $conexion->query($consulta);

    // Inicio de la tabla HTML
    $salida = '<table class="table tabla table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">Actividad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Calificar</th>
                        </tr>
                    </thead>
                    <tbody>';

    // Iterar sobre los datos obtenidos de la consulta
    while ($datos = $resultado->fetch_object()) {
        // Obtener el ID de la actividad
        $idActividad = $datos->id_ACTIVIDAD;

        // Agregar fila a la tabla
        $salida .= '<tr>
                        <td>' . $datos->NOMBRE . '</td>
                        <td>' . $datos->FECHA . '</td>
                        <td>' . $datos->DESCRIPCION . '</td>
                        <td>' . $datos->CARRERA . '</td>
                        <td>
                            <a type="button" class="btn btn-primary calificarboton" data-toggle="modal" data-id="' . $idActividad . '">Calificar</a>
                        </td>
                    </tr>';
    }

    // Fin de la tabla HTML
    $salida .= '</tbody>
                </table>';

    // Mostrar la tabla
    echo $salida;
}
?>



