<?php
	if(isset($_POST["btnregistrar"])){
		if(!empty($_POST["nombre"]) and !empty($_POST["inicio"]) and !empty($_POST["fin"]) and !empty($_POST["carrera"])){
			
			$nombre=$_POST["nombre"];
			$ini=$_POST["inicio"];
			$fin=$_POST["fin"];
			$car=$_POST["carrera"];
			$sql=$conexion->query("insert into evento(INICIO,FIN,NOMBRE,CARRERA) values('$ini','$fin','$nombre','$car')");
			if($sql==1){
				echo '<div class="alert alert-success" role="alert">
			  Registro exitoso
			</div>';
			}else{
				echo '<div class="alert alert-daneger" role="alert">
			  Error al registrar
			</div>';
			}
		}else{
			echo '<div class="alert alert-warning" role="alert">
			  Algunos de los campos estan vacios
			</div>';
			
		}

	}
?>