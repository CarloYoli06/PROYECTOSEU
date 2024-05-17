<?php
// Incluir archivo de conexión a la base de datos
include("C:/xampp/htdocs/ProyectoSEU/control\conexion.php");

if(isset($_GET['nc2']) and isset($_GET['id2'])){
                $nctrl=$_GET['nc2'];
                $act=$_GET['id2'];
                $sql=$conexion->query("delete from alumnos_actividad where noCtrl='$nctrl' and id_EVENTO=$act");
                echo '<script>alert("Hecho")</script>';
                
}
if(isset($_GET['nc']) and isset($_GET['id1'])){
                $nctrl=$_GET['nc'];
                $act=$_GET['id1'];
                $sql=$conexion->query("call sp_inscribir('$nctrl',$act)");
                $datos=$sql->fetch_object();
                $ms=$datos->MSJ;
                echo '<script>alert("'.$ms.'")</script>';
                
}

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
        $sql2=$conexion->query("select count(*) as ins from actividad a inner join alumnos_actividad aa on(aa.id_EVENTO=a.id_ACTIVIDAD) inner join alumnos alu on(alu.noCtrl=aa.noCtrl) where a.id_ACTIVIDAD=$idActividad");
        $d=$sql2->fetch_object();
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
            'LINK' => $dato->LinkedIn,
            'INSC' => $d->ins
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
    //echo json_encode(array('error' => 'No se proporcionó el ID de la actividad'));
}
//echo json_encode($data); // Agrega esta línea al final del script

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>
