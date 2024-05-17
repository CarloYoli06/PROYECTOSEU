<?php
include "conexion.php";

$id=$_POST['ids'];
$visi=$_POST['visi'];


$sql = "UPDATE actividad
SET VISIBILIDAD = $visi
WHERE id_ACTIVIDAD = $id";
if ($conexion->query($sql) === TRUE) {
echo("se ha realizado correctamente");
}


$conexion->close();
 ?>
