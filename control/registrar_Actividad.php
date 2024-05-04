<?php 
//include "conexion.php";
if(isset($_POST["btnregistrar"])){
if(!empty($_POST['nombre']) and !empty($_POST['nomex'])){
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

$sql1=$conexion->query("insert into expositor(Nombre,Telefono,Facebook,Instagram,LinkedIn) values('$nomex','$tel','$face','$inst','$link')");
$sql2=$conexion->query("insert into actividad(NOMBRE,DESCRIPCION,HORARIO,LUGAR,CAPACIDAD,Expositor_idExpositor,TIPO,CARRERA) VALUES('$nombre','$desc','$formato','$lugar',$cap,(select idExpositor from expositor where Nombre='$nomex' order by idExpositor desc limit 1),'$tipo',(SELECT CARRERA FROM evento WHERE id_EVENTO=$id))");
$sql3=$conexion->query("insert into evento_actividad values($id,(select id_Actividad from actividad where Nombre='$nombre' order by id_Actividad desc limit 1))");
if($sql1==1 and $sql2==1 and $sql3==1){
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

