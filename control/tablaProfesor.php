<?php   
require '../control/conexionTabla.php';


$profesor = isset($_POST['profesor'])? $conexion->real_escape_string($_POST['profesor'] ):NULL;

if($profesor == null){

    $where = "where ROLES_ID_ROL = 2;";

}else{
    $where = "where ROLES_ID_ROL = 2 and ( nombres like '%".$profesor."%' or id_personal like'%".$profesor."%'  ) ;";
} 
    

$sql = "SELECT id_personal, 
nombres, apellidos from personal $where" ;

$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;

$html='';

if($num_rows >0){
    while($row = $resultado->FETCH_ASSOC()){
        $html .= '<tr>';
        $html .= '<td>'.$row['id_personal'].'</td>';
        $html .= '<td>'.$row['nombres'].'  '.$row['apellidos'].'</td>';
        $html .='<td><input type="checkbox"  id="cbox1"  /></td>';
        $html .= '</tr>';
    }
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>