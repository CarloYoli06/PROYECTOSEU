<?php

session_start(); 
if(!$_SESSION['autenticado'] or $_SESSION['tipous']!=3){
   header("location: U-1.php");
   exit();
} 
   $id_usuario =  $_SESSION['id_usuario'];
   $nombre=$_SESSION['nombre_usuario'];

include_once '../control/conexionTabla.php';
$objeto = new conexionTabla();
$conexion = $objeto->conectar();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <title>Cerrar Sesión</title>
    <!-- Enlace a Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="./assets/1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn_menu1').click(function(){
                $('#navbarSupportedContent').toggle(); // Alterna la visibilidad del menú desplegable
            });
        });
    </script>
        <script>
        $(document).ready(function(){
            $('.btn_menu2').click(function(){
                $('#navbarSupportedContent1').toggle(); // Alterna la visibilidad del menú desplegable
            });
        });
    </script>
    

</head>
<body class="body_cerrar">
    <HEader>
        
    </HEader>
    <div class="text-warning-emphasis d-flex justify-content-between align-items-center" containe style="background-color:white">
    <!-- Columna izquierda para el menú desplegable -->
    <div class="col">
        <div id="tituloPer" style="background-color: #308BBE; color:white; font-weight: bold; padding-bottom:5px;padding-top:5px;max-width: 400px;">
            <h2>LISTA DE ASISTENCIA</h2>
        </div>
        
    </div>
    
    <div  style="text-align: right;display: flex;background-color:white">
        <button type="button" class="notificaciones" style="position: relative; background: none; border: none; padding: 5px;text-align: right;">
            <img class="puntoRojo" src="./assets/red_circle_flat.png" alt="Punto Rojo" style="position: absolute; top: 0; right: 0; z-index: 1;width: 20px; height: 20px" />
            <img class="campana" src="./assets/e56188aff073d3826d113a02398e223b.png" alt="Campana" style="width: 40px; height: 40px;" />
        </button>
        <div class="container-fluid">
                <!-- Botón toggler -->
                <button class="btn_menu2" style="display: inline-flex; flex-direction: row; align-items: center; position: relative; background: none; border: none; padding: 5px; text-align: left;">
                    <p class="UsuarioP" style="font-weight: bold; font-size: 25px; text-align: right; margin-left: 40px; margin-right: 40px; padding-top: 10px;" 
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <?php echo $nombre; ?>
                    </p>
                    <img class="puntoVerde" src="./assets/green_circle_flat.png" alt="Punto Verde" style="width: 25px; height: 25px; vertical-align: middle;" />
                </button>
                <!-- Enlaces del navbar -->
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent1">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='U-2.php';">Cerrar Sesión</button>
                        </li>
                    </ul>
                </div>

            </div>
        <nav class="navbar navbar-dark menu">
            <div class="container-fluid">
                <!-- Botón toggler -->
                <button class="navbar-toggler btn_main btn_menu1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Enlaces del navbar -->
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent" style="margin-top:200px;margin-right:400px;">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='D-1.php';">LISTA DE ACTIVIDADES</button>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>
<!-- MIGUEL AQUI TUVE QUE AGREGAR UN FORM PARA PODER MANDAR LOS DATOS, ENTONCES SE MOVIÓ EL DISEÑO, TE LO ENCARGO-->
<form action="../control/ExportarCsv.php" method="post">
<div class="funciones">
    <button type="button csv" id="exportar" name="exportar" class="btn btn-lg boton_personalizado btn-primary " >Exportar en .xlsx</button>

    <nav class="navbar bus">
        <a class="navbar-brand act">Actividad: </a>
        <form class="form-inline">
             <input class="form-control mr-sm-2" type="search" placeholder="No.Control" aria-label="Search"   name="campo" id="campo"> 
        </form>
    </nav>

    <nav class="navbar bus bus2">
        <a class="navbar-brand act">Alumno: </a>
        <form class="form-flex">
            <input class="form-control mr-sm-2" type="search" placeholder="No.Control" aria-label="Search" name="alumno" id="alumno">
        </form>
    </nav>
</div>
</form>

<div class="cont_tabla">
    <table class="table tabla table-bordered">
    <thead>
        <tr class="table-secondary">
        <th scope="col">Actividad</th>
        <th scope="col">Número de control</th>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody id="content">

    
    </tbody>
    </table>
</div>





<footer class="footer_cerrar">
    <p> <br></p>
</footer>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    get_data()

        document.getElementById("campo").addEventListener("keyup", get_data)
        document.getElementById("alumno").addEventListener("keyup", get_data)

        function get_data(){
                let input = document.getElementById("campo").value
                let input2 = document.getElementById("alumno").value
                let content =document.getElementById("content")
                let url = "../control/tabla.php"
                let formadata = new FormData()
                formadata.append("campo",input)
                formadata.append("alumno",input2)
                
                fetch(url, {
                        method: "POST",
                        body: formadata,
                }).then(Response => Response.json())
                .then(data =>{
                    content.innerHTML= data
                }).catch(err =>console.log(err))

            
            }

            
    </SCRIPT>
     

</body>
<style>
.boton_personalizado {
    background-color: #57E17E; /* Color naranja */
    border: none; /* Sin borde */
    color: black; /* Texto blanco */
    padding: 10px 20px; /* Espaciado interno */
    border-radius: 20px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar */
    transition: background-color 0.3s ease; /* Transición suave */
    margin: .3em;
    margin-left: 3em;
}

.btn_menu{
    margin: .5em;
    background-color: #F15903; /* Color naranja */
    border: none; /* Sin borde */
    color: white; /* Texto blanco */
    padding: 10px 20px; /* Espaciado interno */
    border-radius: 20px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar */
    transition: background-color 0.3s ease;
}

.btn_menu:hover {
    background-color: #D94C00; /* Cambia el color al pasar el mouse */
}
.menu{
    margin-right: 4em;
}

.btn_main{
    background-color: #308BBE;
    margin-left: 6em;
}
.funciones{
    display: flex;
    flex-flow: row;
    justify-content: space-between;
    
}

.bus{
    background-color: #D9D9D9;
    margin:.3em;
    border-radius: 10px;
}
.bus2{
    margin-right: 3em;
}

.boton_personalizado:hover {
    background-color: #51CD74; /* Cambia el color al pasar el mouse */
}
.cont_tabla{
    margin: 1em;
    border-radius: 10px;
}
.table{
    border-radius: 10px;
}
.body_cerrar {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Altura mínima del viewport */
    margin: 0;
    padding: 0;
    background-color: 308BBE;
}

.header_cerrar {
    display: flex;
    justify-content: center; /* Centra los elementos horizontalmente */
    align-items: center; /* Centra los elementos verticalmente */
    background-color: white;
    height: 5%;
    width: 100%;
}


.footer_cerrar {
    background-color: #308BBE;
    height: 50px;
    width: 100%;
}
.dropdown-menu {
    --bs-dropdown-min-width: 6rem;
     top: auto; 
     left: auto;
  }
.dropdown-menu {
    --bs-dropdown-padding-y: 0rem; 
    --bs-dropdown-font-size: 0rem; 
    --bs-dropdown-bg: transparent; 
    --bs-dropdown-border-color: transparent;
    }
</style>

</html>