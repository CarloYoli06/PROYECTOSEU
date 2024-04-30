<?php
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";

$id=$_GET['id'];
$sql=$conexion->query("select*from evento where id_EVENTO=$id");
$dato=$sql->fetch_object();
$html='<div class="elemento_contenedor1">
                    <h style="font-weight: bold;">Inicio: <h style="font-weight: 100;">'.$dato->INICIO.'</h> </h>
                    <p style="font-weight: bold;">Fin: <h style="font-weight: 100;">'.$dato->FIN.'</p>
                </div>
                <div class="elemento_contenedor2">
                    <h4>'.$dato->NOMBRE.'</h4>';
                    $sql1=$conexion->query("SELECT* FROM `evento_actividad` ea inner join actividad a on(ea.`ACTIVIDAD_id_ACTIVIDAD`=a.`id_ACTIVIDAD`) where `Evento_id_EVENTO`=$id");
                    while ($datos=$sql1->fetch_object()) {
                    	$html=$html.'<p style="font-weight: bold;">'.$datos->HORARIO.'</p>
                    <button type="button" class="btn btn-primary btn-lg boton_personalizado" style="margin-bottom: 2%;" onclick="mensaje2('.$datos->id_ACTIVIDAD.')">'.$datos->NOMBRE.'</button>';
                    }
                    $html=$html.'</div>';
                    echo $html;
                    

 ?>