<?php
session_start();
$_SESSION['usuario'] = $_REQUEST['nc'];
$_SESSION['contra'] = $_REQUEST['contra'];

include "conexion.php";


if(isset($_POST["btn"])){
    $nc=$_POST["nc"];
    $contra=$_SESSION['contra'];
    $perfil = "";
    echo $nc;
    echo $contra;
    $sql=$conexion->query("call sp_inicio('$nc', '$contra')");
    $resultado=$sql->fetch_object();
    $regreso = $resultado->regreso;
    
    switch ($regreso){
        case 0:



            header("location: error.html");
            break;
        case 1:
            echo "HAZ ACCEDIDO COMO Alumno";
            header("location: viewAlumno.html");
            break;
         case 2:
            echo "HAZ ACCEDIDO COMO ADMINISTRADOR";
            header("location: viewAdmin.html");
            break;
        case 3:
            echo "HAZ ACCEDIDO COMO DOCENTE";
            header("location: viewDocente.html");
            break;      
    }

}
?>