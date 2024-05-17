<?php
include "conexion.php";
        if(isset($_POST['button'])) {
            $buscar = $_POST['bar'];  
            header("location: /ProyectoSEU/vistas/A-02.1.php?id=$buscar");
        }

?>