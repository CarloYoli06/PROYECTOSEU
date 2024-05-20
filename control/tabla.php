<?php   
require '../control/conexionTabla.php';

$columns= ['nombre_actividad','noCtrl','NOMBRE','FECHA'];

$campo = isset($_POST['campo'])? $conexion->real_escape_string( $_POST['campo'] ):NULL;

$alumno = isset($_POST['alumno'])? $conexion->real_escape_string( $_POST['alumno'] ):NULL;

$where="";

if($campo != null && $alumno == null){

    $where = "where ac.nombre like '%".$campo."%' and aa.ASISTENCIA=1;";

}else if($campo == null && $alumno != null){
    $where = "where al.nombre like '%".$alumno."%' and aa.ASISTENCIA=1;";
}else if($campo != null && $alumno != null){
    $where = "where ac.nombre like '%".$campo."%' and al.nombre like '%".$alumno."%' and aa.ASISTENCIA=1;";
}


$sql = "SELECT 
aa.noCtrl,
ac.NOMBRE AS nombre_actividad,
CONCAT(al.NOMBRE,' ',al.APELLIDOPAT,' ',al.APELLIDOMAT) AS NOMBREAL,
ac.FECHA
FROM ALUMNOS_ACTIVIDAD aa
JOIN ALUMNOS al ON aa.noCtrl = al.noCtrl
JOIN ACTIVIDAD ac ON aa.id_EVENTO = ac.id_ACTIVIDAD 
$where" ;





$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;

$html='';

if($num_rows >0){
    while($row = $resultado->FETCH_ASSOC()){
        $html .= '<tr>';
        $html .= '<td>' .$row['nombre_actividad'].'</td>';
        $html .= '<td>' .$row['noCtrl'].'</td>';
        $html .= '<td>' .$row['NOMBREAL'].'</td>';
        $html .= '<td>' .$row['FECHA'].'</td>';
        $html .= '</tr>';
    }
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>