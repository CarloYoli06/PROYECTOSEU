<?php 
include "conexion.php";

if(isset($_GET['a']) or isset($_GET['c'])){
	$a=$_GET['a'];
	$c=$_GET['c'];
	$resultado=$conexion->query("select NOMBRE,(select count(*) from actividad a inner join alumnos_actividad aa on(aa.id_EVENTO=a.id_ACTIVIDAD) inner join alumnos alu on(alu.noCtrl=aa.noCtrl) where aa.ASISTENCIA=1 and a.id_ACTIVIDAD=actividad.id_ACTIVIDAD) AS ASIS,HORARIO,CARRERA from actividad where NOMBRE like '%$a%' AND CARRERA like '%$c%' ORDER BY id_ACTIVIDAD DESC");
	$salida='<table class="table tabla table-bordered">
    <thead>
        <tr class="table-secondary">
        <th scope="col" style="width: 300px;">Actividad</th>
        <th scope="col" style="width: 200px;">Total Asistencia</th>
        <th scope="col" style="width: 200px;">Fecha</th>
        <th scope="col" style="width: 200px;">Carrera</th>
        <th scope="col" style="width: 200px;">Lista</th>
        </tr>
    </thead>
    <tbody id="content">';
    while ($datos=$resultado->fetch_object()) {
    	$salida.='<tr>
            <th>'.$datos->NOMBRE.'</th>
            <th>'.$datos->ASIS.'</th>
            <th>'.$datos->HORARIO.'</th>
            <th>'.$datos->CARRERA.'</th>
            <th><a href="A-04.1.php?act='.$datos->NOMBRE.'">Lista</a></th>
        </tr>';
    }
    $salida.='</tbody>
			</table>';
	echo $salida;
}

 ?>
