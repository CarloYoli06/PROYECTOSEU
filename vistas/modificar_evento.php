<?php
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
$id=$_GET['id'];

$sql=$conexion->query("select*from evento where id_EVENTO=$id");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form class="col-4 m-auto" method="POST">
			<h3 class="text-center text-secondary">Actualizar evento</h3>
			<input type="hidden" name="id" value="<?= $_GET['id']?>">
			<?php 
			include "C:/xampp/htdocs/ProyectoSEU/control/editar_evento.php";
			while ($datos=$sql->fetch_object()) {
			?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Nombre del evento</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="<?= $datos->NOMBRE?>">
		    
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Inicio</label>
		    <input type="date" class="form-control" id="exampleInputPassword1" name="inicio" value="<?= $datos->INICIO?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Fin</label>
		    <input type="date" class="form-control" id="exampleInputPassword1" name="fin" value="<?= $datos->FIN?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Selecciona carrera</label>
		    <select class="form-select" aria-label="Default select example" name="carrera">
			  <option selected><?= $datos->CARRERA?></option>
			  <option value="IC">IC</option>
			  <option value="IE">IE</option>
			  <option value="INGC">INGC</option>
			  <option value="INGE">INGE</option>
			  <option value="ISC">ISC</option>
			  <option value="LAW">LAW</option>
			  <option value="ADM">ADM</option>
			</select>
		  </div>
		  <?php }?>
		  <button type="submit" class="btn btn-primary" name="btnregistrar">Guardar</button>
		</form>
</body>
</html>