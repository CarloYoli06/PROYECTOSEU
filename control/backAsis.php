<?php
include "conexion.php";
if (isset($_GET['n'])) {
	$q=$_GET['n'];
	$resultado=$conexion->query("select*from actividad where NOMBRE like '%$q%'");
	$salida='<table class="table tabla table-bordered">
    <thead>
        <tr class="table-secondary">
        <th scope="col" style="width: 700px;">Actividad</th>
        <th scope="col" style="width: 200px;">Fecha</th>
        <th scope="col" style="width: 200px;">Administrar</th>
        </tr>
    </thead>
    <tbody id="content">';
    while ($datos=$resultado->fetch_object()) {
    	$salida.='<tr>
            <th>'.$datos->NOMBRE.'</th>
            <th>'.$datos->HORARIO.'</th>
            <th><a href="A-03.1.php?id='.$datos->id_ACTIVIDAD.'&n='.$datos->NOMBRE.'">Escanear</a></th>
        </tr>';
    }
    $salida.='</tbody>
			</table>';
	echo $salida;
 	
 }

 if (isset($_GET['t'])) {
 	$id=$_GET['t'];
 	$resultado=$conexion->query("select a.noCtrl as nc,a.NOMBRE as nom, CONCAT(a.APELLIDOPAT,' ',a.APELLIDOMAT,' ',a.NOMBRE) as ape,a.carrera as ca,a.SEMESTRE as se,a.CORREO as co from alumnos a inner join alumnos_actividad aa on(a.noCtrl=aa.noCtrl) inner join actividad ac on(aa.id_EVENTO=ac.id_ACTIVIDAD) where ac.id_ACTIVIDAD=$id and aa.ASISTENCIA=1");
	$salida='<table class="table tabla table-bordered">
        <thead>
            <tr class="table-secondary">
            <th scope="col" style="width: 150px;">No. Control</th>
            <th scope="col">Alumnos Registrados</th>
            </tr>
        </thead>
        <tbody id="content">';
    while ($datos=$resultado->fetch_object()) {
    	$salida.='<tr>
            <th>'.$datos->nc.'</th>
            <th>'.$datos->ape.'</th>
        </tr>';
    }
    $salida.='</tbody>
			</table>';
	echo $salida;
  }

  if (isset($_GET['id']) and isset($_GET['nct']) and strlen($_GET['nct'])<=10) {
   				$nctrl=$_GET['nct'];

				$act=$_GET['id'];
				$sql=$conexion->query("call sp_asistencia('$nctrl',$act)");
				$datos=$sql->fetch_object();
				$ms=$datos->MSJ;
				$ms1="NÚMERO DE CONTROL INVALIDO";
				
				if(strcmp($ms,$ms1)==0){
				  echo "<script>alert('".$ms."')</script>";
					
				}
				
   } 
?>