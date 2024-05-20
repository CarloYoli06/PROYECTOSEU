<?php
include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
include "C:/xampp/htdocs/ProyectoSEU/control/cont_05.php";
 session_start(); 
 if(!$_SESSION['autenticado'] or $_SESSION['tipous']!=2){
    header("location: U-1.php");
    exit();
}
$id_usuario =  $_SESSION['id_usuario'];
   $nombre=$_SESSION['nombre_usuario'];
$prom = 0;
$cap = 0;
$ins = 0;
$act = 0;
while($dato = mysqli_fetch_array($re)){
    $prom = $prom + $dato['ESTRELLAS'];
    $cap = $cap + $dato['CAPACIDAD'];
    $ins = $ins + $dato['INSCRITOS'];
    $act =$act + $dato['Actividades'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <title>Estadistica</title>
    <!-- Enlace a Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="./assets/1.png">
    
    

</head>

<body class="body_cerrar">
    <HEader>
        
    </HEader>
    <div class="text-warning-emphasis d-flex justify-content-between align-items-center" containe style="background-color:white">
    <!-- Columna izquierda para el menú desplegable -->
    <div class="col">
        <div id="tituloPer" style="background-color: #308BBE; color:white; font-weight: bold; padding-bottom:5px;padding-top:5px;max-width: 400px;">
            <h2>&nbsp Estadistica</h2>
        </div>
        
    </div>
    <div  style="text-align: right;display: flex;background-color:white">
        <button type="button" class="notificaciones" style="position: relative; background: none; border: none; padding: 5px;text-align: right;">
            <img class="puntoRojo" src="./assets/red_circle_flat.png" alt="Punto Rojo" style="position: absolute; top: 0; right: 0; z-index: 1;width: 20px; height: 20px" />
            <img class="campana" src="./assets/e56188aff073d3826d113a02398e223b.png" alt="Campana" style="width: 40px; height: 40px;" />
        </button>
        <nav class="navbar navbar-dark menu">
        <div class="container-fluid">
                <!-- Botón toggler -->
                <button style="display: inline-flex; flex-direction: row; align-items: center; position: relative; background: none; border: none; padding: 5px; text-align: left;">
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
        </nav>
            <nav class="navbar navbar-dark menu">
            <div class="container-fluid">
                <!-- Botón toggler -->
                <button class="navbar-toggler btn_main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Enlaces del navbar -->
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent" >
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-02.1.php';">ACTIVIDADES</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-03.php';">ESCANEAR</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-04.php';">ASISTENCIA</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-05.php';">ESTADISTICA</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-06.php';">EXPOSITORES</button>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>
<form method ="post" action = "\ProyectoSEU\control\cont_05.php" >
<div class="funciones" style="margin: 0 auto;">
<button type="button csv" class="btn btn-lg boton_personalizado btn-primary " name = "btnExport" >Exportar en .xlsx</button>
<nav class="navbar bus">
        <a class="navbar-brand ">Carrera: </a>
        <form class="form-inline" method="post" action="\ProyectoSEU\control\cont_05.php">
            <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="width: 300px;" name = "txtcar" >
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name  = "btncar">Buscar</button>
        </form>
    </nav>
      <nav class="navbar bus">
        <a class="navbar-brand act">Actividad: </a>
            <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="width: 300px;"  name = "txtact">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name = "btnact">Buscar</button>
        
    </nav>
    <nav class="navbar bus">
        <a class="navbar-brand act">Evento: </a>
            <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="width: 300px;" name = "txteve">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name = "btneve">Buscar</button>
        
    </nav>
    
</div>
</form>
<div class="funciones" style="margin: 0 auto;">
    <nav class="navbar bus">
        <a class="navbar-brand ">Total de Actividades: </a>
        <a class="navbar-brand act"><?php echo($act) ?> </a>
    </nav>
    <nav class="navbar bus">
        <a class="navbar-brand act">Total Asistencia: </a>
        <a class="navbar-brand act"><?php echo($ins) ?> </a>
    </nav>
    <nav class="navbar bus">
        <a class="navbar-brand act">Total Eventos: </a>
        <a class="navbar-brand act"><?php echo($eve) ?></a>
    </nav>
</form>    

</div>

<div class="cont_tabla"  style="margin: 0 auto;" id="datos">
    <table class="table tabla table-bordered">
    <thead>
        <tr class="table-secondary">
        <th scope="col" style="width: 200px;">Actividad</th>
        <th scope="col" style="width: 200px;">Carrera</th>
        <th scope="col" style="width: 200px;">Evento</th>
        <th scope="col" style="width: 200px;">Asistencia Real</th>
        <th scope="col" style="width: 200px;">Asistencia Apartada</th>
        <th scope="col" style="width: 200px;">Estrellas</th>
        </tr>
    </thead>
    <tbody id="content">
    <?php 
        $can = 0;
        while($dato = mysqli_fetch_array($r)){
    ?>   
        <tr>
            <th><?php echo($dato['ACTIVIDAD']) ?></th>
            <th><?php echo($dato['CARRERA']) ?></th>
            <th><?php echo($dato['EVENTO']) ?></th>
            <th><?php echo($dato['INSCRITOS']) ?></th>
            <th><?php echo($dato['CAPACIDAD']) ?></th>
            <th><?php echo($dato['ESTRELLAS']) ?></th>
            
        </tr>
        <?php
        $can = $can+1;
        }

    


        ?>
        <tr>
            <td scope="row" colspan="3" style="font-weight: bold;">Promedio:</td>
            <th><?php echo($ins/$can)?></th>
            <th><?php echo($cap/$can)?></th>
            <th><?php echo($prom/$can)?></th>
            
        </tr>
    </tbody>
    </table>
</div>




<footer class="footer_cerrar">
    <p> <br></p>
</footer>


<script src="js/bootstrap.bundle.min.js"></script>

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
    margin-left: 1em;
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
}

.bus{
    background-color: #D9D9D9;
    margin:1em;
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
    --bs-dropdown-padding-y: 0rem; 
    --bs-dropdown-font-size: 0rem; 
    --bs-dropdown-bg: transparent; 
    --bs-dropdown-border-color: transparent;
    }
</style>

</html>