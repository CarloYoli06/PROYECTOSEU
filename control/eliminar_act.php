<?php
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
	if (!empty($_GET['id2'])) {
		$id=$_GET['id2'];
		$sql3=$conexion->query("select Expositor_idExpositor from actividad where id_ACTIVIDAD=$id");
		$r=$sql3->fetch_object();
		$ide=$r->Expositor_idExpositor;
		$sql=$conexion->query("delete from actividad where id_ACTIVIDAD=$id");
		$sql2=$conexion->query("delete from expositor where idExpositor=$ide");
		if ($sql==1 and $sql2==1) {
			//echo '<div class="alert alert-success">Evento eliminado correctamente</div>';
		}else{
			echo '<div class="alert alert-danger">Ocurrió un error</div>'; 
		}
		$ida=$_GET['id'];
		header("location: C:/xampp/htdocs/ProyectoSEU/vistas/actividades.php?id=$ida");
	} 
 ?>