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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Cronograma de Actividades</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Pcontent.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./assets/1.png">
    <style>
        #SemanaAnterior,
        #SemanaProxima {
            background-color: #308BBE;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 30px;
            margin: 5px;
            font-weight: bold;
            padding: 10px 20px; /* Ajusta el padding según el tamaño deseado */
            cursor: pointer;
        }

        #SemanaAnterior:hover,
        #SemanaProxima:hover {
            background-color: #1F6099; /* Color de fondo al pasar el mouse */
            
        }
        table {
            width: 100%;
            border-collapse: separate; /* Utiliza un modelo de borde separado */
            border-spacing: 10px; /* Espacio entre las celdas */
        }
        
        th {
            border: 1px solid black;
            padding: 8px;
            min-width: 200px;
            min-height: 200px;
            padding: 25px;
        }
        td {
            border: 1px solid black;
            padding: 25px;
            text-align: center;
            border-radius: 10px;
            margin: 5px;
            max-width: 200px; /* Establece el ancho máximo de la celda */
            min-width: 200px;
            min-height: 200px;
            white-space: nowrap; /* Evita que el texto se ajuste automáticamente */
            overflow: hidden; /* Oculta el texto que excede el ancho máximo */
            text-overflow: ellipsis; /* Muestra puntos suspensivos (...) para indicar que hay más texto */
            word-wrap: break-word;
            font-size: 16px;
            text-shadow: 
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px  1px 0 #000,
                1px  1px 0 #000;
        }
        .dropdown-menu {
            --bs-dropdown-min-width: 4rem;
        }
        th:not(:first-child) {
            width: calc(100% / 7);
        }
        body {
           text-align: center;
        }
        tbody {
            border: none; 
            background-color: transparent;
        }
        .containerprincipal {
            max-width: 2400px; /* Cambia este valor según tus necesidades */
            margin: 0 auto; /* Centra el contenedor en la página */
            padding: 0 20px; /* Agrega espacio alrededor del contenido */
            min-width: 1500px;
            background-color: #308BBE;
        }
        .dropdown-menu {
    --bs-dropdown-padding-y: 0rem; 
    --bs-dropdown-font-size: 0rem; 
    --bs-dropdown-bg: transparent; 
    --bs-dropdown-border-color: transparent;
    }

    </style>
</head>
<body class="containerprincipal body_cerrar">

<HEader>
        
    </HEader>
<div class="text-warning-emphasis d-flex justify-content-between align-items-center" containe style="background-color:white">
    <!-- Columna izquierda para el menú desplegable -->
    <div class="col">
        <div id="tituloPer" style="background-color: #308BBE; color:white; font-weight: bold; padding-bottom:5px;padding-top:5px;max-width: 400px;">
            <h2>CRONOGRAMA</h2>
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
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='U-2.php';">Cerrar Sesión</button>
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
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent" style="margin-top:250px;margin-right:500px;">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='Login.php';">Eventos</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='D-2.php';">Eventos</button>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>

<!--
-->
<div id="table-container" class="container-fluid" style="border-color: transparent;background-color:white">
    <table id="tablaActividades" class="table table-striped" style="border-color: transparent;">
            <tr>
                <th></th>
                <?php 
                include("../control/conexion.php");
                include('../control/SistemaActividades.php');
                generateWeekTable($conexion);
                ?>
            </tr>
    </table>
</div>

<!-- CONTENERDOR DE ABAJO-->
<div class="footer-container" style="flex: 1; background-color:#308BBE; height: 150px; border: radiud 60px;">
    
</div>

<!-- Agregar controles de navegación por semana -->

<div class="modal modal_prin" id="myModal" tabindex="-1" style="max-width: 1800px; max-height: 800px;">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header header_modal" >
                <h5 class="modal-title titulo_actividad text-center"><span id="tituloEvento"></span></h5>
                <button type="button" class="btn-close boton_cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal_contenedor">
                    <div class="elemento_contenedor1">
                        <h6>Expositor</h6>
                        <img class="img_expositor" src="https://www.kindpng.com/picc/m/227-2271036_usuario-persona-personas-perfil-cuenta-humana-vector-pas.png" alt="Expositor">
                        <div class="contenedor_expositor">
                        <span id="nombre_expositor" style="font-size: 20px;color:white;"></span>
                        </div>
                    </div>
                    <div class="elemento_contenedor2"> 
                        <span id="nombreEvento" style="font-size: 28px;font-weight:bold;"></span></li>
                        <span id="descripcionEvento" style="font-size: 18px;"></span>
                            
                        <ul>
                            <li>Lugar: <span id="lugarEvento"></span></li>
                            <li>Fecha: <span id="fechaEvento"></span></li>
                            <li>Horario: <span id="horarioEvento"></span></li>
                            <li>Capacidad: <span id="capacidadEvento"></span></li>
                            <li>Inscritos: <span id="inscritosEvento"></span></li>
                            <li>Carrera: <span id="carreraEvento"></span></li>
                        </ul>
                        <div class="contenedor_infoexpositor">
                            <p class="cont">Contacto:</p>
                            <div class="expo_colum">
                                <div class="colum">
                                    <p class="colum_cont">Telefono:</p>
                                    <p class="colum_cont" id="telefonoEvento"></p>
                                </div >
                                <div class="colum">
                                    <p class="colum_cont">Facebook:</p>
                                    <p class="colum_cont" id="facebookEvento"></p>
                                </div>
                                <div class="colum">
                                    <p class="colum_cont">Instagram:<span id="carreraEvento"></span></p>
                                    <p class="colum_cont" id="instagramEvento"></p>
                                </div>
                                <div class="colum">
                                    <p class="colum_cont">LinkedIn:<span id="carreraEvento"></span></p>
                                    <p class="colum_cont" id="linkedinEvento"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="asistir">
                <button type="button" class="btn btn-primary btn-lg boton_personalizado" id="btnDesinscribirse">Desinscribirse</button>
                <button type="button" class="btn btn-primary btn-lg boton_personalizado" data-bs-toggle="modal" data-bs-target="#modalqr" style="margin-left: 10%; margin-bottom: 3%;">>Registrar Asistencia</button>
            </div>
            <div class="modal-footer footer_ventana">
                <p> </p>
            </div>
        </div>
    </div>
</div>
<!-- VENTANA MODAL PARA QR-->
<div class="modal modal_prin" id="modalqr" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header header_modal" >
        <h5 class="modal-title titulo_actividad text-center">Asistencia</h5>
        <button type="button" class="btn-close boton_cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class=" modal_contenedor">
        <div class="elemento_contenedor1">
          <div class="contenedor_imagen">
          
          

          <?php

            include('../control/barcode.php');
            $generator=new barcode_generator();
            $options=array('sx'=>15,'sy'=>15,'p'=>-12);
            $svg=$generator->render_svg("qr",$id_usuario,$options);
            echo $svg;

          ?>
        </div>
        </div>
      </div>
      <div class="asistir">
          <h6 class="asistir">Presenta el codigo QR al asistente encargado de la asistencia</h6>
      </div>
      <div class="modal-footer footer_ventana">
          <p> </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
     var idActividad = 0;
$(document).ready(function() {
    $('#tablaActividades tbody').css('border-color', 'transparent');
    $('.evento-celda').click(function() {
        idActividad = parseInt($(this).data('id'));  //$(this).text();//$(this).data('id'); // Captura el ID de la actividad de la celda
        mostrarDetalleEvento(idActividad); // Llama a la función mostrarDetalleEvento con el ID de la actividad
        $('#nombreEvento').text(idActividad);
    });

    $('#btnDesinscribirse').click(function() {
        desinscribirse(idActividad);
    });
    
});

function desinscribirse(idActividad) {
    // Redirigir a desinscribirse.php con el ID de la actividad como parámetro
    window.location.href = "../control/desinscribirse.php?id_actividad=" + idActividad;
}
function mostrarDetalleEvento(idActividad) {
    // Realiza una solicitud AJAX para obtener más detalles de la actividad
    $.ajax({
        url: '../control/obtener_detalle_actividad.php',
        type: 'GET',
        data: { id: idActividad },
        success: function(response) {
            var data = JSON.parse(response); // Parsea la respuesta JSON
            $('#nombreEvento').text(data.NOMBRE); 
            $('#descripcionEvento').text(data.DESCRIPCION);
            $('#lugarEvento').text(data.LUGAR);
            $('#fechaEvento').text(data.FECHA);
            $('#horarioEvento').text(data.HORARIO);
            $('#capacidadEvento').text(data.CAPACIDAD);
            $('#inscritosEvento').text(data.INSCRITOS);
            $('#carreraEvento').text(data.CARRERA);
            
            $('#nombre_expositor').text(data.NombreExp);
            $('#telefonoEvento').text(data.TELEFONO);
            $('#facebookEvento').text(data.FACEBOOK);
            $('#instagramEvento').text(data.INSTAGRAM);
            $('#linkedinEvento').text(data.LINKEDIN);
            //$('#linkedinEvento').text(data.DESCRIPCION); 
            $('#myModal').modal('show');
        },
        error: function(xhr, status, error) {
            // Maneja errores si la solicitud AJAX falla
            console.error(error);
        }
    });
}
</script>


</body>

<style>

.btn_menu{
    margin: 1em;
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
    margin-right: 3em;
}

.btn_main{
    background-color: #308BBE;
}
.boton_personalizado:hover {
    background-color: #D94C00; /* Cambia el color al pasar el mouse */
}

.footer_cerrar {
    background-color: white;
    height: 50px;
    width: 100%;
}
.header_modal{
    vertical-align: center;
    background-color: #308BBE;
    color: white;
}
.contenedor_expositor{
    display: flex;
    justify-content: center;
    border-radius: 20em;
    background-color: #F15903;
    padding: .1em .5em ;
    margin: 0em 0em;
    height: fit-content;
    width: fit-content;
}
.img_expositor{
    height: auto;
    width: 4em;
    margin: 1em ;
}
.modal_contenedor{
    display:flex;
    justify-content: center;
    margin: 1em;
}
.elemento_contenedor1 {
    display:flex;
    flex-direction: column;
    align-items:center;
    justify-content:center;
    vertical-align: top; /* Para alinear los elementos en la parte superior */
    margin: 0 10px; /* Ajusta el margen entre los elementos */
}
.elemento_contenedor2 {
    display:flex;
    flex-direction: column;
    height:fit-content;
    justify-content:center;
    vertical-align: top; /* Para alinear los elementos en la parte superior */
    margin: 0 10px; /* Ajusta el margen entre los elementos */
}
.boton_cerrar{
    background-color: white;
}
.expo_colum{
    display:inline-flex;
    flex-direction: row;
    align-items: centers;
    background-color: #FFAD33; 
    border-radius: 10px;
}
.modal_prin{
    --bs-modal-width:50%;
}
.colum{
    margin: 0em 1em;
    text-align: left;
}
.colum_cont{
    text-overflow: clip; 
    color: white;

}
.footer_ventana{
    background-color: #308BBE;
}
.asistir{
    text-align: center;
}
.contenedor_infoexpositor{
    display: inline;
    background-color: #FFAD33; 
    border-radius: 10px;
    padding: .2em;
}
.cont{
    color: white;
}

.nombre_expositor{
    color: white;

}
</style>
</html>