<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EVENTOS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/229ed2604b.js" crossorigin="anonymous"></script>
	
</head>
<body>
	<script>
		function eliminar() {
			var res=confirm("¿Esta seguro de eliminar?");
			return res;
		}
	</script>
	<?php
	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php"; 
		if(!empty($_GET['nc'])){
				$nct=$_GET['nc'];
				$act=$_GET['id'];
				$sql1=$conexion->query("update alumnos_actividad set ASISTENCIA=0 WHERE noCtrl='$nct' and id_EVENTO=$act");
				$nom=$_GET['nom'];
				header("location: C:/xampp/htdocs/ProyectoSEU/vistas/asistencia.php?id=$act&nom=$nom");
			}
	 ?>
<div class="container-fluid row">
	<form class="col-4" method="POST">
		<br>
			<h3 class="text-center text-secondary">Registro de asistencia</h3><br>
			<h4 class="text-secondary"><?php echo $_GET['nom'];?></h3><br><br>
			<input type="hidden" name="id" value="<?= $_GET['id']?>">
			<?php 
			include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			
			if(isset($_POST['btnregistrar'])){
				$nctrl=$_POST['nc'];
				$act=$_GET['id'];
				$sql=$conexion->query("call sp_asistencia('$nctrl',$act)");
				$datos=$sql->fetch_object();
				$ms=$datos->MSJ;
				$ms1="NÚMERO DE CONTROL INVALIDO";
				if(strcmp($ms,$ms1)==0){
				?><script>alert('<?php  echo $ms;?>')</script>
					<?php  
				}
			}
			?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Número de control</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nc">
		  </div>
		  <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
		</form>
	<div class="col-8 p-4">
		<h3 class="text-center text-secondary">LISTA DE ASISTENCIA</h3>
		<?php
		include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
		
		 ?>
	<table class="table">
			  <thead class="bg -warning">
			    <tr>
			      <th scope="col">NO CTRL</th>
			      <th scope="col">NOMBRE</th>
			      <th scope="col">APELLIDOS</th>
			      <th scope="col">CARRERA</th>
			      <th scope="col">SEMESTRE</th>
			      <th scope="col">CORREO</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			  	$id=$_GET['id'];
			  	//echo $id;
			  	$sql=$conexion->query("select a.noCtrl as nc,a.NOMBRE as nom, CONCAT(a.APELLIDOPAT,' ',a.APELLIDOMAT) as ape,a.carrera as ca,a.SEMESTRE as se,a.CORREO as co from alumnos a inner join alumnos_actividad aa on(a.noCtrl=aa.noCtrl) inner join actividad ac on(aa.id_EVENTO=ac.id_ACTIVIDAD) where ac.id_ACTIVIDAD=$id and aa.ASISTENCIA=1");
			  	while($datos=$sql->fetch_object()){
			  		//echo $id;

			  	?>
			    <tr>
			      <td><?= $datos->nc?></td>
			      <td><?= $datos->nom?></td>
			      <td><?= $datos->ape?></td>
			      <td><?= $datos->ca?></td>
			      <td><?= $datos->se?></td>
			      <td><?= $datos->co?></td>
			      
			      <td>
			      	
			      	<a onclick="return eliminar()"  href="C:/xampp/htdocs/ProyectoSEU/vistas/asistencia.php?id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>&nc=<?= $datos->nc ?>" class="btn btn-small btn-danger">DESINSCRIBIR</a>
			      	
			      </td>
			    </tr>
			    <?php }?>
			  </tbody>
			</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>