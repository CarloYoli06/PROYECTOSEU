<?php
include "conexion.php";
 
if(isset($_POST['txtact']) || isset($_POST['txtcar']) || isset($_POST['txteve'])) {
    $carr = $_POST['txtcar'];
    $even = $_POST['txteve'];
    $acti = $_POST['txtact'];
    if(isset($_POST['btnact']) || isset($_POST['btncar']) || isset($_POST['btneve']))
    header("location: /ProyectoSEU/vistas/A-05.php?nom=$acti&car=$carr&eve=$even");    
}


if(isset($_GET['nom'])&&isset($_GET['car'])&&isset($_GET['eve'])) {
    // Sanitizar el ID de la actividad
    $nombre = mysqli_real_escape_string($conexion, $_GET['nom']);
    $carrera = mysqli_real_escape_string($conexion, $_GET['car']);
    $evento = mysqli_real_escape_string($conexion, $_GET['eve']);
    
    

    // Realizar la consulta para obtener los detalles de la actividad

    $query = "SELECT * FROM ACTIVIDAD";
    $result = mysqli_query($conexion, $query);
    
    if($result && mysqli_num_rows($result) >0 ){
        $que = "SELECT count(DISTINCT aa.id_EVENTO) as Evento from alumnos_actividad aa
        INNER JOIN evento_actividad EA ON(EA.Evento_id_Evento = Aa.id_Evento)
        INNER JOIN actividad A ON(a.id_Actividad = EA.Actividad_id_Actividad)
        INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
        WHERE A.NOMBRE LIKE '%$nombre%' AND A.CARRERA LIKE '%$carrera%' AND E.NOMBRE LIKE '%$evento%'
        ";
        $resu = mysqli_query($conexion,$que);
        $even = mysqli_fetch_object($resu);
        $eve = $even->Evento;
        
    $q = "SELECT A.NOMBRE AS ACTIVIDAD, E.CARRERA AS CARRERA,E.NOMBRE AS EVENTO, A.CAPACIDAD AS CAPACIDAD, A.INSCRITOS AS INSCRITOS,
    A.id_Actividad,AA.id_Evento,    
    FORMAT(AVG(AA.cantidad_Estrellas),2) AS ESTRELLAS, COUNT(distinct A.id_Actividad) as Actividades From actividad A
    INNER JOIN evento_actividad EA ON(EA.ACTIVIDAD_id_ACTIVIDAD = A.id_ACTIVIDAD)
    INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
    INNER JOIN alumnos_actividad AA ON(AA.id_EVENTO = E.id_EVENTO) WHERE A.NOMBRE LIKE '%$nombre%' AND A.CARRERA LIKE '%$carrera%' AND E.NOMBRE LIKE '%$evento%' GROUP BY A.id_actividad";
    $r = mysqli_query($conexion,$q);
    $re = mysqli_query($conexion,$q);
    }
}else{
    $query = "SELECT * FROM ACTIVIDAD";
    $result = mysqli_query($conexion, $query);
    $que = "SELECT count(DISTINCT aa.id_EVENTO) as Evento from alumnos_actividad aa
    INNER JOIN evento_actividad EA ON(EA.Evento_id_Evento = Aa.id_Evento)
    INNER JOIN actividad A ON(a.id_Actividad = EA.Actividad_id_Actividad)
    INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
    ";
    $resu = mysqli_query($conexion,$que);
    $even = mysqli_fetch_object($resu);
    $eve = $even->Evento;

    if($result && mysqli_num_rows($result) >0 ){
    $q = "SELECT A.NOMBRE AS ACTIVIDAD, E.CARRERA AS CARRERA,E.NOMBRE AS EVENTO, A.CAPACIDAD AS CAPACIDAD, A.INSCRITOS AS INSCRITOS,FORMAT(AVG(AA.cantidad_Estrellas),2) AS ESTRELLAS, COUNT(E.id_Evento) AS Eventos, COUNT(A.id_Actividad) as Actividades From actividad A
    INNER JOIN evento_actividad EA ON(EA.ACTIVIDAD_id_ACTIVIDAD = A.id_ACTIVIDAD)
    INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
    INNER JOIN alumnos_actividad AA ON(AA.id_EVENTO = E.id_EVENTO) GROUP BY A.id_Actividad";
    $r = mysqli_query($conexion,$q);
    $re = mysqli_query($conexion,$q);

    $qu= "SELECT A.NOMBRE AS ACTIVIDAD, E.CARRERA AS CARRERA,E.NOMBRE AS EVENTO, A.INSCRITOS AS ASISTENCIAR, A.CAPACIDAD AS ASISTENCIAA,
    FORMAT(AVG(AA.cantidad_Estrellas),2) AS ESTRELLAS From actividad A
    INNER JOIN evento_actividad EA ON(EA.ACTIVIDAD_id_ACTIVIDAD = A.id_ACTIVIDAD)
    INNER JOIN evento E ON(E.id_EVENTO = EA.Evento_id_EVENTO)
    INNER JOIN alumnos_actividad AA ON(AA.id_EVENTO = E.id_EVENTO)GROUP BY A.id_actividad";
    

    $arr = mysqli_query($conexion,$qu);
}
}
if(isset($_POST['btnExport'])){
        
    $filename = "estadistica.xls";
    header("Content-Type: application:vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename =".$filename);
     
    $out = "<table>
              <thead>
                <tr>
                 <th>ACTIVIDAD</th>
                 <th>CARRERA</th>
                 <th>EVENTO</th>
                 <th>ASISTENCIA REAL</th>
                 <th>ASISTENCIA ESPERADA</th>
                 <th>ESTRELLAS</th>
                    <tbody>
                    
                ";
    $prom = 0;
    $cap = 0;
    $ins = 0;
    $act = 0;
                while($dato = mysqli_fetch_array($r)){
                    $actividad = utf8_decode( $dato['ACTIVIDAD']);
                    $evento = utf8_decode( $dato['EVENTO']);
                    $out.="<tr>
                    <td>".$actividad."</td>
                    <td>". $dato['CARRERA']."</td>
                    <td>".$evento."</td>
                    <td>". $dato['INSCRITOS']."</td>
                    <td>". $dato['CAPACIDAD']."</td>
                    <td>".$dato['ESTRELLAS']."</td>
                    </tr>";
                    $prom = $prom + $dato['ESTRELLAS'];
                    $cap = $cap + $dato['CAPACIDAD'];
                    $ins = $ins + $dato['INSCRITOS'];
                    //$act =$act + $dato['ACTIVIDAD'];
                    $act .=1;    
                }
    $out.="</tr>
    <tr>
    <td >Promedio:</td>
    <th>".$ins/$act."</th>
    <th>".$cap/$act.".</th>
    <th>".$prom/$act."</th>
    </tr>
    </tbody>
    </table>
    " ;      

                echo($out);
}




$conexion ->close();
?>