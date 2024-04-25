<?php
session_start();
$_SESSION['usuario'] = $_REQUEST['nc'];
$_SESSION['contra'] = $_REQUEST['contra'];

include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";

if(isset($_POST["btn"])){
    $nc=$_POST["nc"];
    $contra=$_SESSION['contra'];
    $perfil = "";
    echo $nc;
    echo $contra;
    $sql=$conexion->query("call sp_inicio('$nc', '$contra')");
    $resultado=$sql->fetch_object();
    $regreso = $resultado->regreso;

    mysqli_free_result($sql);

    switch ($regreso){
        case 0:
            header("location: /ProyectoSEU/vistas/U-1.php");
            break;
        case 1:
            echo "HAZ ACCEDIDO COMO Alumno";
            /*$sql = "SELECT noCtrl, nombre from alumnos where noCtrl = '$nc'";
            $result = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_assoc($result);
            mysqli_free_result($result); // Liberar los resultados de la consulta

            // Asigna los valores obtenidos a las variables de sesión
            $_SESSION['id_usuario'] = $row['noCtrl'];
            $_SESSION['nombre_usuario'] = $row['nombre'];
            */$_SESSION['autenticado'] = true;
            header("location: /ProyectoSEU/vistas/E-1.php");
            break;
         case 2:
            echo "HAZ ACCEDIDO COMO ADMINISTRADOR";
            /*$sql = "SELECT id_personal, nombres from personal where id_personal = '$nc'";
            $result = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_assoc($result);
            mysqli_free_result($result); // Liberar los resultados de la consulta


            // Asigna los valores obtenidos a las variables de sesión
            $_SESSION['id_usuario'] = $row['id_personal'];
            $_SESSION['nombre_usuario'] = $row['nombres'];
            $_SESSION['autenticado'] = true;
            */header("location: /ProyectoSEU/vistas/A-2.php");
            break;
        case 3:
            echo "HAZ ACCEDIDO COMO DOCENTE";
         /*   
            //$sql1 = $conexion->query("SELECT id_personal, nombres from personal where id_personal = '$nc'");

            //if (mysqli_num_rows($sql1) > 0) {
                // Mostrar los eventos encontrados

              //  while ($row = mysqli_fetch_assoc($sql1)) {
                //    $id_personal = $row['id_personal']; // Obtener el ID de la actividad
                    $nombre = $$row['nombres'];
                    // Almacenar el ID de la actividad en el array
                } 
            } 
            // Asigna los valores obtenidos a las variables de sesión
            $_SESSION['id_usuario'] = $id_personal;
            $_SESSION['nombre_usuario'] = $nombre;
            $_SESSION['autenticado'] = true;
            */
            header("location: /ProyectoSEU/vistas/D-1.php");
            break;      
    }

}
?>
