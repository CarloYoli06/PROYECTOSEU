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
	<h1 class="text-center p-3">ACTIVIDADES</h1>
		<?php 
		include "C:/xampp/htdocs/ProyectoSEU/control/eliminar_act.php";
	 	?>
	<div class="container-fluid row">
		<form class="col-4" method="POST">
			<h3 class="text-center text-secondary">Registro de actividades</h3>
			<input type="hidden" name="id" value="<?= $_GET['id']?>">
			<?php 
			include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			include "C:/xampp/htdocs/ProyectoSEU/control/registrar_Actividad.php"
			?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Nombre de actividad</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre">
		  </div>
		  <div class="form-floating">
			  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="desc"></textarea>
			  <label for="floatingTextarea2">Descripción</label>
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Horario</label>
		    <input type="datetime-local" class="form-control" id="exampleInputPassword1" name="horario">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Lugar</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="lugar">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Capacidad</label>
		    <input type="number" class="form-control" id="exampleInputPassword1" min="0" max="1000" value="1" name="cap">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Tipo</label>
		    <select class="form-select" aria-label="Default select example" name="tipo">
			  <option selected>C</option>
			  <option value="T">T</option>
			  <option value="C">C</option>

			</select>
		  </div>
		  <h3 class="text-center text-secondary">Datos del expositor</h3>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Nombre</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nomex">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Telefono</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tel">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Facebook</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="face">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Instagram</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="inst">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">LinkedIn</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="link">
		  </div>
		  <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
		</form>
		<div class="col-8 p-4">
			<table class="table">
			  <thead class="bg-info">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">NOMBRE</th>
			      <th scope="col">HORARIO</th>
			      <th scope="col">LUGAR</th>
			      <th scope="col">CAPACIAD</th>
			      <th scope="col">EXPOSITOR</th>
			      <th scope="col">TIPO</th>
			      <th scope="col"></th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			  	$id=$_GET['id'];
			  	//echo $id;
			  	$sql=$conexion->query("SELECT*FROM EventoAct where id_EVENTO=$id");
			  	while($datos=$sql->fetch_object()){


			  	?>
			    <tr>
			      <td><?= $datos->ID?></td>
			      <td><?= $datos->nomact?></td>
			      <td><?= $datos->HORARIO?></td>
			      <td><?= $datos->LUGAR?></td>
			      <td><?= $datos->CAPACIDAD?></td>
			      <td><?= $datos->nomex?></td>
			      <td><?= $datos->TIPO?></td>
			      <td>
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/modificar_act.php?id=<?= $datos->ID ?> & id2=<?php echo $id;?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
			      	<a onclick="return eliminar()"  href="C:/xampp/htdocs/ProyectoSEU/vistas/actividades.php?id2=<?= $datos->ID ?> & id=<?= $_GET['id']?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/inscritos.php?id=<?= $datos->ID ?>"class="btn btn-small btn-info">INSCRITOS</a>
			      	
			      </td>
			      <td><a href="C:/xampp/htdocs/ProyectoSEU/vistas/asistencia.php?id=<?= $datos->ID ?>&nom=<?= $datos->nomact ?>"class="btn btn-small btn-success">ASISTENCIA</a></td>
			      <td><a href="C:/xampp/htdocs/ProyectoSEU/vistas/docentes.php?id=<?= $datos->ID ?>"class="btn btn-small btn-light">DOCENTES</a></td>
			    </tr>
			    <?php }?>
			  </tbody>
			</table>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>