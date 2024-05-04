<?php 
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
$query="SELECT*FROM evento";
$salida="";
if(isset($_GET['con'])){
	$q=$_GET['con'];
	$query="SELECT*FROM evento WHERE NOMBRE LIKE'%$q%'";


}
$resultado=$conexion->query($query);
if($resultado->num_rows>0){
	$salida.='<table class="table">
			  <thead class="bg-info">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">NOMBRE</th>
			      <th scope="col">INICIO</th>
			      <th scope="col">FIN</th>
			      <th scope="col">CARRERA</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>';
	while ($datos=$resultado->fetch_object()) {
		$salida.='<tr>
			      <td>'.$datos->id_EVENTO.'</td>
			      <td>'.$datos->NOMBRE.'</td>
			      <td>'.$datos->INICIO.'</td>
			      <td>'.$datos->FIN.'</td>
			      <td>'.$datos->CARRERA.'</td>
			      <td>
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/modificar_evento.php?id='.$datos->id_EVENTO.'" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
			      	<a onclick="return eliminar()" href="C:/xampp/htdocs/ProyectoSEU/vistas/eventos.php?id='.$datos->id_EVENTO.'" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/actividades.php?id='.$datos->id_EVENTO.'"class="btn btn-small btn-info">Actividades</a>
			 
			      </td>
			      
			    </tr>';	
		}	
			    
			 $salida.='</tbody>
			</table>';
 }else{
 	$salida.="NO HAY DATOS";
 }
 echo $salida;
 ?>