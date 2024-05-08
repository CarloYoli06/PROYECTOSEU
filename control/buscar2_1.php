<?php
include "conexion.php";
    $buscar = $_POST['bar'];
        if(isset($_POST['button'])) {  
            header("location: /ProyectoSEU/vistas/A-02.1.php?id=$buscar");
        }

?>