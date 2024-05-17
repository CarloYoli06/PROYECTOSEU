<?php   
require '../control/conexionTabla.php';


$evento = isset($_POST['evento'])? $conexion->real_escape_string( $_POST['evento'] ):NULL;

$inicio = isset($_POST['inicio'])? $conexion->real_escape_string( $_POST['inicio'] ):NULL;

$fin = isset($_POST['fin'])? $conexion->real_escape_string( $_POST['fin'] ):NULL;

$carrera  = isset($_POST['carrera'])? $conexion->real_escape_string( $_POST['carrera'] ):NULL;


$sql_id = "SELECT id_evento from evento ORDER BY id_evento DESC LIMIT 1 ";

$res = $conexion->query($sql_id);

$idEvento = array_map('intval',$res->fetch_assoc());
$num_rows = $res->num_rows;

$sql = "INSERT INTO evento (id_EVENTO, inicio, fin,nombre,visibilidad,carrera) VALUES ($idEvento[id_evento]+1, '$inicio','$fin','$evento',0,'$carrera');" ;

$resultado = $conexion->query($sql);

?>