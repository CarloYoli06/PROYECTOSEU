<?php 
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
$query="SELECT*FROM personal where ROLES_ID_ROL!=1";
$salida="";
if(isset($_GET['con'])){
	$q=$_GET['con'];
	$id=$_GET['id'];
	$query="SELECT*FROM personal where ROLES_ID_ROL!=1 and (NOMBRES LIKE '%$q%' OR APELLIDOS LIKE '%$q%' OR CORREO LIKE '%$q%') and id_PERSONAL NOT IN(SELECT `id_PERSONAL_R` FROM `personal_actividad` where `id_ACTIVIDAD_R`=$id)";


}
$resultado=$conexion->query($query);
if($resultado->num_rows>0){
	$salida.='<table class="table">
			  <thead class="bg-info">
			    <tr>
			      <th scope="col">NOMBRES</th>
			      <th scope="col">APELLIDOS</th>
			      <th scope="col">CORREO</th>
			      
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>';
	while ($datos=$resultado->fetch_object()) {
		$salida.='<tr>
			      <td>'.$datos->NOMBRES.'</td>
			      <td>'.$datos->APELLIDOS.'</td>
			      <td>'.$datos->CORREO.'</td>
			      
			      <td>
			      	
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/docentes.php?id='.$id.'&user='.$datos->id_PERSONAL.'&op=1" class="btn btn-small btn-success"><i class="fa-sharp fa-regular fa-plus"></i></a>
			      	
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
