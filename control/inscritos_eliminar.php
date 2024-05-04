<?php
		include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
		
		if(!empty($_GET['id']) and !empty($_GET['nct'])){
			
			$id=$_GET['id'];
			$nc=$_GET['nct'];
			$sql=$conexion->query("delete from alumnos_actividad WHERE id_EVENTO=$id and noCtrl='$nc'");
			if ($sql==1) {
			//echo '<div class="alert alert-success">Evento eliminado correctamente</div>';
		}else{
			echo '<div class="alert alert-danger">Ocurrió un error</div>'; 
		}

		} 
		 ?>