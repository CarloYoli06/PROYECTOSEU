<?php   
require '../control/conexionTabla.php';



$carrera = isset($_POST['carrera'])? $conexion->real_escape_string( $_POST['carrera'] ):NULL;

$evento = isset($_POST['evento'])? $conexion->real_escape_string( $_POST['evento'] ):NULL;

$where="";

if($evento != null && $carrera == null){

    $where = "where nombre like '%".$evento."%';";

}else if($evento == null && $carrera != null){
    $where = "where carrera like '%".$carrera."%';";
}else if($evento != null && $carrera != null){
    $where = "where evento like '%".$evento."%' and carrera like '%".$carrea."%';";
}


$sql = "SELECT 
nombre, inicio, fin, visibilidad, carrera, id_evento from evento
$where" ;





$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;

$html='';

if($num_rows >0){
    while($row = $resultado->FETCH_ASSOC()){
        $html .= '<tr>';
        $html .= '<td id="'.$row['nombre'].'">' .$row['nombre'].'</td>';
        $html .= '<td>' .$row['inicio'].'</td>';
        $html .= '<td>' .$row['fin'].'</td>';
        $html .= '<td>' .$row['carrera'].'</td>';
        $html .= '<td><a href="A-02.2.php" >Editar</a></td>';
        if($row['visibilidad'] == 1){
            $html .='<td><input type="checkbox" checked id="cbox1" value="primer_checkbox" /></td>';
        }else{
            $html .='<td><input type="checkbox"  id="cbox1" value="primer_checkbox" /></td>';
        }
        $html .= '</tr>';
    }
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>