<?php

$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "seu";

$conexion = mysqli_connect($host,$usuario,$clave,$bd);

if($conexion){
	?> 
	    
	<?php

}   else{
	?> 
	    	<h3 class="incompleto">Hay un error con los servidores</h3>
	<?php
}

?>