<?php  
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
if(isset($_POST["btnregistrar"])){
	$nombre=$_POST['nombre'];
	$desc=$_POST['desc'];
	$horario=$_POST['horario'];
	$formato=date('Y-m-d H:i:s', strtotime($horario));
	$lugar=$_POST['lugar'];
	$cap=$_POST['cap'];
	$tipo=$_POST['tipo'];
	$nomex=$_POST['nomex'];
	$tel=$_POST['tel'];
	$face=$_POST['face'];
	$inst=$_POST['inst'];
	$link=$_POST['link'];
	$id=$_POST['id'];
	$idexp=$_POST['idexp'];
	$id2=$_POST['id2'];
	$sql1=$conexion->query("update expositor set Nombre='$nomex',Telefono='$tel',Facebook='$face',Instagram='$inst',LinkedIn='$link' WHERE idExpositor=$idexp");
	$sql2=$conexion->query("update actividad SET NOMBRE='$nombre',DESCRIPCION='$desc',HORARIO='$formato',LUGAR='$lugar',CAPACIDAD=$cap,TIPO='$tipo' WHERE id_ACTIVIDAD=$id");
	if($sql==1 && $sql2==1){

				header("location:C:/xampp/htdocs/ProyectoSEU/vistas/actividades.php?id=$id2");
			}else{
				echo '<div class="alert alert-daneger" role="alert">
			  Error al Actualizar
			</div>';
			}
}

?>