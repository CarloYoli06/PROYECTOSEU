<?php
include "conexion.php";
 
if(isset($_POST['txtact']) || isset($_POST['txtcar']) || isset($_POST['txteve'])) {
    $carr = $_POST['txtcar'];
    $even = $_POST['txteve'];
    $acti = $_POST['txtact'];
    if(isset($_POST['btnact']) || isset($_POST['btncar']) || isset($_POST['btneve']))
    header("location: /ProyectoSEU/vistas/A-05.php?nom=$acti&car=$carr&eve=$even");    
}


if(isset($_GET['nom'])&&isset($_GET['car'])&&isset($_GET['eve'])) {
    // Sanitizar el ID de la actividad
    $nombre = mysqli_real_escape_string($conexion, $_GET['nom']);
    $carrera = mysqli_real_escape_string($conexion, $_GET['car']);
    $evento = mysqli_real_escape_string($conexion, $_GET['eve']);
    
    

    // Realizar la consulta para obtener los detalles de la actividad
    $query = "SELECT * FROM ACTIVIDAD";
    $result = mysqli_query($conexion, $query);
    
    if($result && mysqli_num_rows($result) >0 ){
    $q = "SELECT A.NOMBRE AS ACTIVIDAD, E.CARRERA AS CARRERA,E.NOMBRE AS EVENTO, A.CAPACIDAD AS CAPACIDAD, A.INSCRITOS AS INSCRITOS,FORMAT(AVG(AA.cantidad_Estrellas),2) AS ESTRELLAS, COUNT(*) AS CANT From actividad A
    INNER JOIN evento_actividad EA ON(EA.ACTIVIDAD_id_ACTIVIDAD = A.id_ACTIVIDAD)
    INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
    INNER JOIN alumnos_actividad AA ON(AA.id_EVENTO = E.id_EVENTO) WHERE A.NOMBRE LIKE '%$nombre%' AND A.CARRERA LIKE '%$carrera%' AND E.NOMBRE LIKE '%$evento%' GROUP BY E.NOMBRE";
    $r = mysqli_query($conexion,$q);
    }
}else{
    $query = "SELECT * FROM ACTIVIDAD";
    $result = mysqli_query($conexion, $query);
    
    if($result && mysqli_num_rows($result) >0 ){
    $q = "SELECT A.NOMBRE AS ACTIVIDAD, E.CARRERA AS CARRERA,E.NOMBRE AS EVENTO, A.CAPACIDAD AS CAPACIDAD, A.INSCRITOS AS INSCRITOS,FORMAT(AVG(AA.cantidad_Estrellas),2) AS ESTRELLAS, COUNT(*) AS CANT From actividad A
    INNER JOIN evento_actividad EA ON(EA.ACTIVIDAD_id_ACTIVIDAD = A.id_ACTIVIDAD)
    INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
    INNER JOIN alumnos_actividad AA ON(AA.id_EVENTO = E.id_EVENTO) GROUP BY E.NOMBRE";
    $r = mysqli_query($conexion,$q);
}
}
?>