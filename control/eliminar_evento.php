<?php 
	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
	if (!empty($_GET['id'])) {
		try{
		$id=$_GET['id'];
		$sql=$conexion->query("delete from evento where id_EVENTO=$id");
		if ($sql==1) {
			echo '<div class="alert alert-success">Evento eliminado correctamente</div>';
		}else{
			echo '<div class="alert alert-danger">Ocurrió un error</div>'; 
		}
	}catch(Exception $e){
	echo '<script>alert("Elimina primero las actividades del evento")</script>';
	}
}
 ?>