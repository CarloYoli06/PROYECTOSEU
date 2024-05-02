<?php
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: U-1.php");
    exit;
}

// Obtener el ID de la actividad de la URL
if(isset($_GET['id_actividad'])) {
    $id_actividad = $_GET['id_actividad'];

    // Obtener el ID de usuario de la sesión
    $id_usuario = $_SESSION['id_usuario'];

    // Realizar la conexión a la base de datos (asumiendo que tienes un archivo de conexión)
    include("../control/conexion.php");

    // Ejecutar la consulta SQL para eliminar la entrada de la tabla ALUMNOS_ACTIVIDAD
    $query = "DELETE FROM ALUMNOS_ACTIVIDAD WHERE id_EVENTO = ? AND noCtrl = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("is", $id_actividad, $id_usuario);

    if($stmt->execute()) {
        // Redirigir a la página de cronograma o a donde desees
        header("Location: ../vistas/E-1.php");
        exit;
    } else {
        // Manejar el caso en que la eliminación falle
        echo "Error al desinscribirse.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Manejar el caso en que no se proporcionó un ID de actividad válido
    echo "ID de actividad no válido.";
}
?>
