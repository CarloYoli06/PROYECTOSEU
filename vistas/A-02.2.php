<?php
 session_start(); 
 if(!$_SESSION['autenticado']){
    header("location: U-1.php");
    exit();
 } 
    $id_usuario =  $_SESSION['id_usuario'];
    $nombre=$_SESSION['nombre_usuario'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <title>Editar evento</title>
    <!-- Enlace a Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="./assets/1.png">
    
    

</head>
<body class="body_cerrar">
    <HEader>
        
    </HEader>
    <div class="text-warning-emphasis d-flex justify-content-between align-items-center" containe style="background-color:white">
    <!-- Columna izquierda para el menú desplegable -->
    <div class="col">
        <div id="tituloPer" style="background-color: #308BBE; color:white; font-weight: bold; padding-bottom:5px;padding-top:5px;max-width: 400px;">
            <h2>&nbsp EDITAR EVENTO</h2>
        </div>
        
    </div>
    
    <div  style="text-align: right;display: flex;background-color:white">
        <button type="button" class="notificaciones" style="position: relative; background: none; border: none; padding: 5px;text-align: right;">
            <img class="puntoRojo" src="./assets/red_circle_flat.png" alt="Punto Rojo" style="position: absolute; top: 0; right: 0; z-index: 1;width: 20px; height: 20px" />
            <img class="campana" src="./assets/e56188aff073d3826d113a02398e223b.png" alt="Campana" style="width: 40px; height: 40px;" />
        </button>
        <div class="container-fluid">
                <!-- Botón toggler -->
                <button style="display: inline-flex; flex-direction: row; align-items: center; position: relative; background: none; border: none; padding: 5px; text-align: left;">
                    <p class="UsuarioP" style="font-weight: bold; font-size: 25px; text-align: right; margin-left: 40px; margin-right: 40px; padding-top: 10px;" 
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <?php echo $nombre ?>
                    </p>
                    <img class="puntoVerde" src="./assets/green_circle_flat.png" alt="Punto Verde" style="width: 25px; height: 25px; vertical-align: middle;" />
                </button>
                <!-- Enlaces del navbar -->
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent1">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='U-2.php';" >Cerrar Sesión</button>
                        </li>

                    </ul>
                </div>

            </div>
        <nav class="navbar navbar-dark menu">
            <div class="container-fluid">
                <!-- Botón toggler -->
                <button class="navbar-toggler btn_main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Enlaces del navbar -->
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent" style="margin-top:200px;margin-right:400px;">
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

<div class="funciones">

    <nav class="navbar bus" style="height: 90px; margin-left: 15px; width: 500px; background-color: #FFFFFF;">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 50px; width: 380px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Editar</button>
        </form>
    </nav>


    <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(2, 1fr);">

        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style="font-size: smaller; font-weight: bold;">Inicio: </a>
            <form class="form-inline" style="height: 25px;">
                <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 20px;">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="height: 25px; font-size: 9px;">Editar</button>
            </form>
        </nav>
        
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style="font-size: smaller; font-weight: bold;">Carrera: </a>
            <form class="form-inline" style="height: 25px;">
                <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 20px;" disabled>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="height: 25px; font-size: 9px;">Editar</button>
            </form>
        </nav>

        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style="font-size: smaller; font-weight: bold;">Fin: </a>
            <form class="form-inline" style="height: 25px;">
                <input class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 20px;">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="height: 25px; font-size: 9px;">Editar</button>
            </form>
        </nav>

    </div>

    <button type="button csv" class="btn btn-lg boton_personalizado btn-primary " style="height: 60px; margin-left: 18%;">Eliminar</button>

    <button type="button csv" class="btn btn-lg boton_personalizado btn-primary " style="height: 60px;">Guardar</button>

</div>

<div class="funciones">

    <button type="button csv" class="btn btn-lg boton_personalizado btn-primary " >Actividad nueva</button>

    <button type="button csv" class="btn btn-lg boton_personalizado btn-primary " >Actividad creada</button>

</div>

<div class="cont_tabla">
    <table class="table tabla table-bordered">
    <thead>
        <tr class="table-secondary">
        <th scope="col">Avtividad</th>
        <th scope="col">Inicio</th>
        <th scope="col" style="width: 130px;">Horario</th>
        <th scope="col">Carrera</th>
        <th scope="col">Evento</th>
        <th scope="col">Lugar</th>
        <th scope="col" style="width: 130px;">Capacidad</th>
        <th scope="col" style="width: 130px;">Administrar</th>
        <th scope="col" style="width: 130px;">Visibilidad</th>
        </tr>
    </thead>
    <tbody id="content">
    
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>16:00</th>
            <th>ISC</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>12:00</th>
            <th>IGE</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox2" value="segundo_checkbox" /></th>
        </tr>
        <tr>
            <th>Partido</th>
            <th>01/04/24</th>
            <th>15:00</th>
            <th>IE</th>
            <th>Jornada academica</th>
            <th>Cancha 2</th>
            <th>-</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Partido</th>
            <th>01/04/24</th>
            <th>09:00</th>
            <th>IQ</th>
            <th>Jornada academica</th>
            <th>Cancha 1</th>
            <th>-</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>10:00</th>
            <th>IBQ</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>18:00</th>
            <th>ISC</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>12:00</th>
            <th>IGE</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox2" value="segundo_checkbox" /></th>
        </tr>
        <tr>
            <th>Partido</th>
            <th>01/04/24</th>
            <th>13:00</th>
            <th>IE</th>
            <th>Jornada academica</th>
            <th>Cancha 1</th>
            <th>-</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>10:00</th>
            <th>-</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
        </tr>
        <tr>
            <th>Conferencia</th>
            <th>01/04/24</th>
            <th>12:00</th>
            <th>-</th>
            <th>Jornada academica</th>
            <th>Sala audiovisual</th>
            <th>100</th>
            <th><a href="ass.s">Editar</a></th>
            <th><input type="checkbox" id="cbox1" value="primer_checkbox" /></th>
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