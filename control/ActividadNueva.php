<?php   
require '../control/conexionTabla.php';



$evento = isset($_POST['evento'])? $conexion->real_escape_string( $_POST['evento'] ):NULL;

$carrera = isset($_POST['carrera'])? $conexion->real_escape_string( $_POST['carrera'] ):NULL;

$inicio = isset($_POST['inicio'])? $conexion->real_escape_string( $_POST['inicio'] ):NULL;

$fin = isset($_POST['fin'])? $conexion->real_escape_string( $_POST['fin'] ):NULL;

$nombre = isset($_POST['nombreA'])? $conexion->real_escape_string( $_POST['nombreA'] ):NULL;

$lugar = isset($_POST['lugarA'])? $conexion->real_escape_string( $_POST['lugarA'] ):NULL;

$tipo = isset($_POST['tipoA'])? $conexion->real_escape_string( $_POST['tipoA'] ):NULL;

$capacidad = isset($_POST['capacidadA'])? $conexion->real_escape_string( $_POST['capacidadA'] ):NULL;
$capacidad = (int)$capacidad;
$horainicio = isset($_POST['inicioA'])? $conexion->real_escape_string( $_POST['inicioA'] ):NULL;

$horafin = isset($_POST['finA'])? $conexion->real_escape_string( $_POST['finA'] ):NULL;

$expositor = isset($_POST['expositorA'])? $conexion->real_escape_string( $_POST['expositorA'] ):NULL;
$expositor = (int)$expositor;

$fecha = isset($_POST['fechaA'])? $conexion->real_escape_string( $_POST['fechaA'] ):NULL;

$asistencia = isset($_POST['asistenciaA'])? $conexion->real_escape_string( $_POST['asistenciaA'] ):NULL;
$asistencia = (int)$asistencia;
$descripcion = isset($_POST['descripcionA'])? $conexion->real_escape_string( $_POST['descripcionA'] ):NULL;


$where="";

// echo $evento;
// echo $carrera;
// echo $inicio;
// ECHO 'HOLA';
// echo $fin;
// echo $nombre;
// echo $lugar;

// echo $tipo;
// echo $capacidad;
// echo $horainicio;
// echo $expositor;

// echo $fecha;
// echo $asistencia;
// echo $descripcion;
// echo $horafin;


// $sqlE = "SELECT  id_evento from evento where nombre = '$evento' and inicio ='$inicio' and fin ='$fin' and carrera = '$carrera'" ;
$sqlE = "SELECT id_evento from evento ORDER BY id_evento DESC LIMIT 1 " ;
$idEvento = $conexion->query($sqlE);
$idEventoInt = array_map('intval', $idEvento->fetch_assoc());

$sqlA = "SELECT id_ACTIVIDAD from ACTIVIDAD ORDER BY id_ACTIVIDAD DESC LIMIT 1 ";
$idActividad= $conexion->query($sqlA);
$idActividadInt = array_map('intval', $idActividad->fetch_assoc());


$nueva_actividad = "INSERT INTO Actividad  
(id_ACTIVIDAD,NOMBRE,DESCRIPCION,FECHA,HORARIO,LUGAR,CAPACIDAD,ASISTENCIA,ASISTENCIA_OB,VISIBILIDAD,Expositor_idExpositor,TIPO,CARRERA,INSCRITOS,HORA_FIN)
values ($idActividadInt[id_ACTIVIDAD]+1,'$nombre','$descripcion','$fecha','$horainicio','$lugar',$capacidad,0,$asistencia,0,$expositor,'$tipo','$carrera',0,'$horafin');";
    

 $resultado = $conexion->query($nueva_actividad);

$evento_actividad = "INSERT INTO evento_actividad (actividad_id_actividad, evento_id_evento) values ($idActividadInt[id_ACTIVIDAD]+1,$idEventoInt[id_evento]);";

$resultado2 =$conexion->query($evento_actividad);

$actividades="SELECT a.NOMBRE, a.FECHA,a.HORARIO, a.HORA_FIN, a.LUGAR, a.CAPACIDAD, a.ASISTENCIA_OB
FROM actividad a
JOIN evento_actividad ea ON a.id_ACTIVIDAD = ea.ACTIVIDAD_id_ACTIVIDAD
JOIN evento e ON e.id_EVENTO = ea.Evento_id_EVENTO
WHERE e.id_EVENTO = $idEventoInt[id_evento];";

$resultadoActividades = $conexion->query($actividades);
$num_rows = $resultadoActividades->num_rows;
$html='';

if($num_rows >0){
    while($row = $resultadoActividades->FETCH_ASSOC()){
        $html .= '<tr>';
        $html .= '<td>'.$row['NOMBRE'].'</td>';
        $html .= '<td>'.$row['FECHA'].'</td>';
        $html .= '<td>'.$row['HORARIO'].'</td>';
        $html .= '<td>'.$row['HORA_FIN'].'</td>';
        $html .= '<td>'.$row['LUGAR'].'</td>';
        $html .= '<td>'.$row['CAPACIDAD'].'</td>';
        if($row['ASISTENCIA_OB'] == 0){
        $html .='<td><input type="checkbox"  id="cbox1" disabled  /></td>';
        }else{
            $html .='<td><input type="checkbox"  id="cbox1" disabled checked /></td>';
        }
       
        $html .= '</tr>';
    }
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);



?>