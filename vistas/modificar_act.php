<?php
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
$id=$_GET['id'];

$sql=$conexion->query("select a.NOMBRE as nomact,a.DESCRIPCION,a.HORARIO,a.LUGAR,a.CAPACIDAD,a.TIPO,e.idExpositor,e.NOMBRE as nomex,e.Telefono,e.Facebook,e.Instagram,e.LinkedIn
 from actividad a inner join expositor e on(a.Expositor_idExpositor=e.idExpositor) where a.id_ACTIVIDAD=$id");

?>
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
	<form class="col-4 m-auto" method="POST">
			<h3 class="text-center text-secondary">Registrar información</h3>
			<input type="hidden" name="id2" value="<?= $_GET['id2']?>">

			<input type="hidden" name="id" value="<?= $_GET['id']?>">
			
			<?php 
			include "C:/xampp/htdocs/ProyectoSEU/control/editar_act.php";
			
			while ($datos=$sql->fetch_object()) {
				$h=$datos->HORARIO
			?>
			<input type="hidden" name="idexp" value="<?= $datos->idExpositor?>">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Nombre de actividad</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="<?= $datos->nomact?>">
		  </div>
		  <div class="form-floating">
			  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="desc"><?= $datos->DESCRIPCION?></textarea>
			  <label for="floatingTextarea2">Descripción</label>
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Horario</label>
		    <input type="datetime-local" class="form-control" id="exampleInputPassword1" name="horario" value="<?= $datos->HORARIO?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Lugar</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="lugar" value="<?= $datos->LUGAR?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Capacidad</label>
		    <input type="number" class="form-control" id="exampleInputPassword1" min="0" max="1000" value="<?= $datos->CAPACIDAD?>" name="cap">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Tipo</label>
		    <select class="form-select" aria-label="Default select example" name="tipo">
			  <option selected><?= $datos->TIPO?></option>
			  <option value="T">T</option>
			  <option value="C">C</option>

			</select>
		  </div>
		  <h3 class="text-center text-secondary">Datos del expositor</h3>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Nombre</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nomex" value="<?= $datos->nomex?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Telefono</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tel" value="<?= $datos->Telefono?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Facebook</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="face" value="<?= $datos->Facebook?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Instagram</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="inst" value="<?= $datos->Instagram?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">LinkedIn</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="link" value="<?= $datos->LinkedIn?>">
		  </div>
		  <?php }?>
		  <button type="submit" class="btn btn-primary" name="btnregistrar">Guardar</button>
		</form>
</body>
</html>