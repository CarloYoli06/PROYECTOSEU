<?php 
	if(isset($_POST["btnregistrar"])){
		if(!empty($_POST["nombre"]) and !empty($_POST["inicio"]) and !empty($_POST["fin"]) and !empty($_POST["carrera"])){
			$id=$_POST["id"];
			$nombre=$_POST["nombre"];
			$ini=$_POST["inicio"];
			$fin=$_POST["fin"];
			$car=$_POST["carrera"];
			$sql=$conexion->query("update evento SET INICIO='$ini',FIN='$fin',NOMBRE='$nombre',CARRERA='$car' WHERE id_EVENTO=$id");
			if($sql==1){
				header("location:C:/xampp/htdocs/ProyectoSEU/vistas/eventos.php");
			}else{
				echo '<div class="alert alert-daneger" role="alert">
			  Error al Actualizar
			</div>';
			}
		}else{
			echo '<div class="alert alert-warning" role="alert">
			  Algunos de los campos estan vacios
			</div>';
			
		}

	}