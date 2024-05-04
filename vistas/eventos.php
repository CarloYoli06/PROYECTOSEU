<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EVENTOS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/229ed2604b.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<script>
		function eliminar() {
			var res=confirm("¿Esta seguro de eliminar?");
			return res;
		}
		$(buscar(''));
		function buscar(consulta){
			var ruta="con="+consulta;
			$.ajax({
                url: 'C:/xampp/htdocs/ProyectoSEU/control/backEventos.php',
                type: 'GET',
                data: ruta,
            })
            .done(function(res){
                $('#datos').html(res)
                
            })
            .fail(function(){
                console.log("error");
            })
            .always(function(){
                console.log("complete");
            });
		}

		$(document).on('keyup','#txt',function(){
			var valor=$(this).val();
			if(valor!=""){
				buscar(valor);
			}else{
				buscar('');
			}

		});
	</script>
	<h1 class="text-center p-3">EVENTOS</h1>
		<?php 
		include "C:/xampp/htdocs/ProyectoSEU/control/eliminar_evento.php";
	 	?>
	<div class="container-fluid row">
		<form class="col-4" method="POST">
			<h3 class="text-center text-secondary">Registro de evento</h3>
			<?php 
			include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			include "C:/xampp/htdocs/ProyectoSEU/control/registrar_Evento.php"
			?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Nombre del evento</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre">
		    
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Inicio</label>
		    <input type="date" class="form-control" id="exampleInputPassword1" name="inicio">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Fin</label>
		    <input type="date" class="form-control" id="exampleInputPassword1" name="fin">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Selecciona carrera</label>
		    <select class="form-select" aria-label="Default select example" name="carrera">
			  <option selected>ADM</option>
			  <option value="IC">IC</option>
			  <option value="IE">IE</option>
			  <option value="INGC">INGC</option>
			  <option value="INGE">INGE</option>
			  <option value="ISC">ISC</option>
			  <option value="LAW">LAW</option>

			</select>
		  </div>
		  <div>
		  	<button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
		  </div>
		  
		</form>
		<div class="col-8 p-4">
			<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Buscar</label>
		    <input type="text" class="form-control" id="txt" aria-describedby="emailHelp" name="nombre">
		  </div>
			<div id="datos">
			<table class="table">
			  <thead class="bg-info">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">NOMBRE</th>
			      <th scope="col">INICIO</th>
			      <th scope="col">FIN</th>
			      <th scope="col">CARRERA</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			  	$sql=$conexion->query("select*from evento order by id_EVENTO desc");
			  	while($datos=$sql->fetch_object()){


			  	?>
			    <tr>
			      <td><?= $datos->id_EVENTO?></td>
			      <td><?= $datos->NOMBRE?></td>
			      <td><?= $datos->INICIO?></td>
			      <td><?= $datos->FIN?></td>
			      <td><?= $datos->CARRERA?></td>
			      <td>
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/modificar_evento.php?id=<?= $datos->id_EVENTO ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
			      	<a onclick="return eliminar()" href="C:/xampp/htdocs/ProyectoSEU/vistas/eventos.php?id=<?= $datos->id_EVENTO ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
			      	<a href="C:/xampp/htdocs/ProyectoSEU/vistas/actividades.php?id=<?= $datos->id_EVENTO ?>"class="btn btn-small btn-info">Actividades</a>
			 
			      </td>
			      
			    </tr>
			    <?php }?>
			  </tbody>
			</table>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>