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
		$(buscar('','<?php echo $_GET['id'];?>'));
		function buscar(consulta,id){
			var ruta="con="+consulta+"&id="+id;
			$.ajax({
                url: 'C:/xampp/htdocs/ProyectoSEU/control/backDocentes.php',
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
				buscar(valor,'<?php echo $_GET['id'];?>');
			}else{
				buscar('','<?php echo $_GET['id'];?>');
			}

		});
	</script>
<div class="container-fluid row">
	
	<div class="col-6 p-4">
<div class="mb-3">
		    
		<h3 class="text-center text-secondary">DOCENTES</h3>
		<label for="exampleInputEmail1" class="form-label">Buscar</label>
		    <input type="text" class="form-control" id="txt" aria-describedby="emailHelp" name="nombre">
		  </div>
		<?php
		include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
		if(isset($_GET['user']) and $_GET['op']==1){
			$us=$_GET['user'];
			$idact=$_GET['id'];
			$sql=$conexion->query("insert into `personal_actividad` values('$us',$idact,0)");
			header("location: C:/xampp/htdocs/ProyectoSEU/vistas/docentes.php?id=$idact");
		}
		if(isset($_GET['user']) and $_GET['op']==0){
			$us=$_GET['user'];
			$idact=$_GET['id'];
			$sql=$conexion->query("delete from `personal_actividad` where `id_PERSONAL_R`='$us' and `id_ACTIVIDAD_R`=$idact");
			header("location: C:/xampp/htdocs/ProyectoSEU/vistas/docentes.php?id=$idact");
		}
		 ?>
		 <div id="datos">
	<table class="table">
			  <thead class="bg-info">
			    <tr>
			      <th scope="col">NOMBRES</th>
			      <th scope="col">APELLIDOS</th>
			      <th scope="col">CORREO</th>
			      
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			  	$id=$_GET['id'];
			  	//echo $id;
			  	$sql=$conexion->query("SELECT*FROM personal where ROLES_ID_ROL!=1 and id_PERSONAL NOT IN(SELECT `id_PERSONAL_R` FROM `personal_actividad` where `id_ACTIVIDAD_R`=$id)");
			  	while($datos=$sql->fetch_object()){
			  		//echo $id;

			  	?>
			    <tr>
			      <td><?= $datos->NOMBRES?></td>
			      <td><?= $datos->APELLIDOS?></td>
			      <td><?= $datos->CORREO?></td>
			      
			      <td>
			      	
			      	<a onclick="return eliminar()"  href="C:/xampp/htdocs/ProyectoSEU/vistas/inscritos.php?ide=<?php echo $id;?> & id=<?php echo $id;?>" class="btn btn-small btn-success"><i class="fa-sharp fa-regular fa-plus"></i></a>
			      	
			      </td>
			    </tr>
			    <?php }?>
			  </tbody>
			</table>
			</div>
</div>

<div class="col-6 p-4">

		    
		<h3 class="text-center text-secondary">DOCENTES ASIGNADOS</h3>
		
		<?php
		include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
		//include "inscritos_eliminar.php";
		 ?>
		 
	<table class="table">
			  <thead class="bg-info">
			    <tr>
			      <th scope="col">NOMBRES</th>
			      <th scope="col">APELLIDOS</th>
			      <th scope="col">CORREO</th>
			      
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
			  	$id=$_GET['id'];
			  	//echo $id;
			  	$sql=$conexion->query("select*from personal p inner join personal_actividad pa on(p.id_PERSONAL=pa.id_PERSONAL_R) inner join actividad a on(pa.id_ACTIVIDAD_R=a.id_ACTIVIDAD) where id_ACTIVIDAD=$id and ROLES_ID_ROL!=1");
			  	while($datos=$sql->fetch_object()){
			  		//echo $id;

			  	?>
			    <tr>
			      <td><?= $datos->NOMBRES?></td>
			      <td><?= $datos->APELLIDOS?></td>
			      <td><?= $datos->CORREO?></td>
			      
			      <td>
			      	
			      	<a onclick="return eliminar()"  href="C:/xampp/htdocs/ProyectoSEU/vistas/docentes.php?id=<?php echo $id;?>&user=<?php echo $datos->id_PERSONAL;?>&op=0" class="btn btn-small btn-danger">ELIMINAR</a>
			      	
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