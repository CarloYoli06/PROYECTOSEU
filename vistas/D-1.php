<?php
 session_start(); 
 if(!$_SESSION['autenticado'] or $_SESSION['tipous']!=3){
    header("location: U-1.php");
    exit();
 } 
    $id_usuario =  $_SESSION['id_usuario'];
    $nombre=$_SESSION['nombre_usuario'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/ProyectoSEU/vistas/css/D-1.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <link rel="stylesheet" href="VentanaActividad.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">


    

    <style>
        .separadorChico {
            width: 76%;
            border-top: 6px solid black;
            margin-top: 0px;
            margin-left: 450px;
        }
        .separadorGrande {
            width: 91.5%;
            border-top: 6px solid black;
            margin-top: 20px;
            margin-left: 60px;
        }
        .texto {
            margin-left: 60px;
            margin-top: 20px;
            font-weight: bold;
            font-size: 140%;
        }

        .boton_personalizado {
    background-color: #F15903; /* Color naranja */
    border: none; /* Sin borde */
    color: white; /* Texto blanco */
    padding: 10px 20px; /* Espaciado interno */
    border-radius: 20px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar */
    transition: background-color 0.3s ease; /* Transición suave */
}

.boton_personalizado:hover {
    background-color: #D94C00; /* Cambia el color al pasar el mouse */
}

.header_modal{
  vertical-align: center;
  background-color: #F15903;
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
.dropdown-menu {
    --bs-dropdown-min-width: 6rem;
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
  background-color: #F15903; 
  border-radius: 10px;
}
.modal-dialog{
  width: fit-content;
  max-width: 1000px;
  min-width: 500px;
  min-height: 500px;

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
  background-color: #FFAD33;
}
.asistir{
  text-align: center;

}
.contenedor_infoexpositor{
  display: inline;
  background-color: #F15903; 
  border-radius: 10px;
  padding: .2em;
}
.cont{
  color: white;
}

.nombre_expositor{
  color: white;

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
    margin-right: 5em;
}

.btn_main{
    background-color: #308BBE;
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

.boton_personalizado1:hover {
    background-color: #51CD74; /* Cambia el color al pasar el mouse */
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

</head>

<body class="flex-column">
    <?php  
    if(isset($_POST['btn'])){
        $n=$_POST['n'];
    }
    ?>

<div class="text-warning-emphasis d-flex justify-content-between align-items-center" containe style="background-color:white">
    <!-- Columna izquierda para el menú desplegable -->
    <div class="col">
        <div id="tituloPer" style="background-color: #308BBE; color:white; font-weight: bold; padding-bottom:5px;padding-top:5px;max-width: 400px;">
            <h2>LISTA DE ACTIVIDADES</h2>
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
                <button class="navbar-toggler btn_main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Enlaces del navbar -->
                <div class="dropdown-menu position-absolute" id="navbarSupportedContent" style="margin-top:200px;margin-right:100px;">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='D-2.php';">LISTA DE ASISTENCIA</button>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>


    
    
    <div class="d1 pag_D-1">
        <div class="contenido">
              <div class="area_inscripciones">
                <div class="header_area1">
                    <h3 class="subtitulo_area1">Tus Inscripciones</h3>
                    
                </div>
                <img class="lineaNegra2" src="./assets/e287c778fcb27ce176a2065defa64318.png" alt="alt text" />
                <form method="POST">
                <div class="tarjetas_de_actividades">
                    
                    <?php
                    include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
                    $sql=$conexion->query("select*from personal p inner join `personal_actividad` pa on(p.id_PERSONAL=pa.id_PERSONAL_R) inner join actividad a on(a.id_ACTIVIDAD=pa.id_ACTIVIDAD_R) WHERE p.id_PERSONAL =  '$id_usuario'");
                    while ($datos=$sql->fetch_object()) {
                         // code...
                      
                     ?>

                    <div class="tarjeta3">
                        
                        <div class="fondo1" style="--src:url(../assets/warm_orange_abstract.png)">
                            <h3 class="titulo_actividad2"><?= $datos->NOMBRE?><br /><?= $datos->HORARIO?></h3>
                        </div>
                        
                        <button type="button" class="btn_info2"  onclick="mensaje('<?= $datos->id_ACTIVIDAD ?>')" >
                            
                            <input type="hidden" name="n" value="<?= $datos->NOMBRE ?>">
                            
                            <h3 class="texto_btn">Ver información</h3>
                           
                        </button>
                     

                    </div>
                <?php  }?>
                    
                </div>
                <input type="text" name="id" id="caja" style="display: none;">
                </form>
                
                
            </div>
            <div class="area_actividadesProximas">
                <div class="header_area2">
                    <h3 class="subtitulo_area2">Actividades proximas</h3>

                </div>
                <img class="lineaNegra2" src="./assets/e287c778fcb27ce176a2065defa64318.png" alt="alt text" />
                <div class="tarjetas_de_actividades">
                    <?php
                    include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
                    $sql=$conexion->query("select*from personal p inner join `personal_actividad` pa on(p.id_PERSONAL=pa.id_PERSONAL_R) inner join actividad a on(a.id_ACTIVIDAD=pa.id_ACTIVIDAD_R) WHERE p.id_PERSONAL !=  '$id_usuario'");
                    while ($datos=$sql->fetch_object()) {
                         // code...
                      
                     ?>
                    <div class="tarjeta3">
                        <div class="fondo1" style="--src:url(../assets/warm_orange_abstract.png)">
                            <h3 class="titulo_actividad2"><?= $datos->NOMBRE?><br /><?= $datos->HORARIO?></h3>
                        </div>
                         <button type="button" class="btn_info2"  onclick="mensaje2('<?= $datos->id_ACTIVIDAD ?>')" >
                            <h3 class="texto_btn2">Ver información</h3>
                        </input>
                    </div>
                    <?php } ?>
                    
                   
                    
                </div>
            </div>


            <div class="area_actividadesProximas">
                <div class="header_area2">
                    <h3 class="subtitulo_area2">Eventos proximos</h3>
                </div>
                <img class="lineaNegra2" src="./assets/e287c778fcb27ce176a2065defa64318.png" alt="alt text" />
                <div class="tarjetas_de_actividades">
                    <?php
                    include "C:/xampp/htdocs/ProyectoSEU/control/conexion.php";
                    $sql=$conexion->query("select*from evento");
                    while ($datos=$sql->fetch_object()) {
                         // code...
                      
                     ?>
                    <div class="tarjeta3">
                        <div class="fondo1" style="--src:url(../assets/warm_orange_abstract.png)">
                            <h3 class="titulo_actividad2"><?= $datos->NOMBRE?><br /><?= $datos->INICIO?> - <?= $datos->FIN?></h3>
                        </div>
                         <button type="button" class="btn_info2"  onclick="noti('<?= $datos->id_EVENTO ?>')" >
                            <h3 class="texto_btn2">Ver información</h3>
                        </input>
                    </div>
                    <?php } ?>
                    
                   
                    
                </div>

            </div>
        </div>



    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
    
    <div class="modal bd-example-modal-lg modal_prin" id="myModal" tabindex="-1" aria-labelledby="eventoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header header_modal" >
        <h5 class="modal-title titulo_actividad text-center">Información Actividad </h5>
        
        <button type="button" class="btn-close boton_cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class=" modal_contenedor">
        <div class="elemento_contenedor1">
          <h6>Expositor</h6>
          <img class="img_expositor" src="imagenes\R.png" alt="Expositor">
          <div class="contenedor_expositor">
            <p class="nombre_expositor"><span id="nomex"></span></p>
          </div>
        </div>
        <div class="elemento_contenedor2">
          <h5><span id="conf"></span></h5>
          <li><span id="desc"></span></li>
          <p>Lugar: <span id="lugar"></span></p>
          <p>Fecha y Hora: <span id="horario"></span></p>
          <p>Capacidad: <span id="cap"></span></p>
          <p>Inscritos: 20</p>
          <p>Carrera:<span id="car"></span></p>
          
          <div class="contenedor_infoexpositor">
            <p class="cont">Contacto:</p>
            <div class="expo_colum">
              <div class="colum">
                <p class="colum_cont">Telefono:</p>
                <p class="colum_cont"><span id="tel"></span></p>
              </div >
              <div class="colum">
                <p class="colum_cont">Facebook:</p>
                <p class="colum_cont"><span id="face"></span></p>
              </div>

              <div class="colum">
                <p class="colum_cont">Instagram:</p>
                <p class="colum_cont"><span id="ins"></span></p>
              </div>

              <div class="colum">
                <p class="colum_cont">LinkedIn:</p>
                <p class="colum_cont"><span id="link"></span></p>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="asistir">
          <h6 class="asistir">Asignado a asistir</h6>
      </div>
      <div class="modal-footer footer_ventana">
          <p> </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal modal_prin" id="myModal3" tabindex="-1" style="max-width: 1800px; max-height: 800px;">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header header_modal" >
                <h5 class="modal-title titulo_actividad text-center">Información Evento</h5>
                <button type="button" class="btn-close boton_cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class=" modal_contenedor3" id="respuesta">
                <div class="elemento_contenedor1">
                    <h style="font-weight: bold;">Inicio: <h style="font-weight: 100;">01/04/2024</h> </h>
                    <p style="font-weight: bold;">Fin: <h style="font-weight: 100;">05/04/2024</h> </p>
                </div>
                <div class="elemento_contenedor2">
                    <h4>Jornada academica</h4>
                    <p style="font-weight: bold;">Marzo 1</p>
                    <button type="button" class="btn btn-primary btn-lg boton_personalizado" style="margin-bottom: 2%;">Conferencia aprendizaje</button>
                    <p style="font-weight: bold;">Marzo 2</p>
                    <button type="button" class="btn btn-primary btn-lg boton_personalizado" style="margin-bottom: 2%;">Concurso de videojuegos</button>
                    <p style="font-weight: bold;">Marzo 3</p>
                    <button type="button" class="btn btn-primary btn-lg boton_personalizado" style="margin-bottom: 2%;">Conferencia inteligencia artificial</button>
                    <p style="font-weight: bold;">Marzo 4</p>
                    <button type="button" class="btn btn-primary btn-lg boton_personalizado" style="margin-bottom: 2%;">Conferencia Big-Data</button>   
                    
                </div>
            </div>
             <div class="modal-footer footer_ventana">
                <p> </p>
            </div>
        </div>
    </div>
</div>

  <div class="modal modal_prin" id="myModal2" tabindex="-1" aria-labelledby="eventoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header header_modal" >
        <h5 class="modal-title titulo_actividad text-center">Información Actividad </h5>
        
        <button type="button" class="btn-close boton_cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class=" modal_contenedor">
        <div class="elemento_contenedor1">
          <h6>Expositor</h6>
          <img class="img_expositor" src="imagenes\R.png" alt="Expositor">
          <div class="contenedor_expositor">
            <p class="nombre_expositor"><span id="nomex2"></span></p>
          </div>
        </div>
        <div class="elemento_contenedor2">
          <h5><span id="conf2"></span></h5>
          <li><span id="desc2"></span></li>
          <p>Lugar: <span id="lugar2"></span></p>
          <p>Fecha y Hora: <span id="horario2"></span></p>
          <p>Capacidad: <span id="cap2"></span></p>
          <p>Inscritos: 20</p>
          <p>Carrera:<span id="car2"></span></p>
          
          <div class="contenedor_infoexpositor">
            <p class="cont">Contacto:</p>
            <div class="expo_colum">
              <div class="colum">
                <p class="colum_cont">Telefono:</p>
                <p class="colum_cont"><span id="tel2"></span></p>
              </div >
              <div class="colum">
                <p class="colum_cont">Facebook:</p>
                <p class="colum_cont"><span id="face2"></span></p>
              </div>

              <div class="colum">
                <p class="colum_cont">Instagram:</p>
                <p class="colum_cont"><span id="ins2"></span></p>
              </div>

              <div class="colum">
                <p class="colum_cont">LinkedIn:</p>
                <p class="colum_cont"><span id="link2"></span></p>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="asistir">
          <h6 class="asistir">Puede asistir</h6>
      </div>
      <div class="modal-footer footer_ventana">
          <p> </p>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    
        function mensaje(n) {
            
            
           // alert ("Este boton sirve "+n)
            var nom=parseInt(n);
            document.getElementById("caja").value=n;

            //$('#myModal').modal('show');
            //mostrar(2);
            //modal.style.display = "block";
            $.ajax({
        url: '/ProyectoSEU/control/D11.php',
        type: 'GET',
        data: {id:n},
        success: function(response) {
            var data = JSON.parse(response); // Parsea la respuesta JSON

            $('#conf').text(data.NOMBRE); // Accede a 'data.NOMBRE'
            $('#lugar').text(data.LUGAR); // Accede a 'data.DESCRIPCION'
            $('#desc').text(data.DESCRIPCION); // Accede a 'data.DESCRIPCION'
            $('#horario').text(data.HORARIO);
            $('#cap').text(data.CAPACIDAD);
            $('#car').text(data.CARRERA);
            $('#nomex').text(data.NOMEX);
            $('#ins').text(data.INS);
            $('#tel').text(data.TEL);
            $('#link').text(data.LINK);
            $('#face').text(data.FACE);
            $('#myModal').modal('show');
        },
        error: function(xhr, status, error) {
            alert("error");
            // Maneja errores si la solicitud AJAX falla
            console.error(error);
        }
   });

             
}
function mensaje2(n) {
            
            
            //alert ("Este boton sirve "+n)
            var nom=parseInt(n);
            document.getElementById("caja").value=n;

            //$('#myModal').modal('show');
            //mostrar(2);
            //modal.style.display = "block";
            $.ajax({
        url: '/ProyectoSEU/control/D11.php',
        type: 'GET',
        data: {id:n},
        success: function(response) {
            var data = JSON.parse(response); // Parsea la respuesta JSON

            $('#conf2').text(data.NOMBRE); // Accede a 'data.NOMBRE'
            $('#lugar2').text(data.LUGAR); // Accede a 'data.DESCRIPCION'
            $('#desc2').text(data.DESCRIPCION); // Accede a 'data.DESCRIPCION'
            $('#horario2').text(data.HORARIO);
            $('#cap2').text(data.CAPACIDAD);
            $('#car2').text(data.CARRERA);
            $('#nomex2').text(data.NOMEX);
            $('#ins2').text(data.INS);
            $('#tel2').text(data.TEL);
            $('#link2').text(data.LINK);
            $('#face2').text(data.FACE);

            $('#myModal2').modal('show');
            
        },
        error: function(xhr, status, error) {
            alert("error");
            // Maneja errores si la solicitud AJAX falla
            console.error(error);
        }
   });

             
}
        function noti(id) {
            //alert ("Notificaciones nuevas"+id)
            var ruta="id="+id;
            
            $.ajax({
                url: '/ProyectoSEU/control/backModal.php',
                type: 'GET',
                data: ruta,
            })
            .done(function(res){
                $('#respuesta').html(res)
                $('#myModal3').modal('show');
            })
            .fail(function(){
                console.log("error");
            })
            .always(function(){
                console.log("complete");
            });
        }

        function noti2(id2) {

            alert ("Notificaciones nuevas"+id2)
            var ruta="id="+id;
            
            $.ajax({
        url: '/ProyectoSEU/control/backModal.php',
        type: 'GET',
        data: {id:id2},
        success: function(res) {
            
            $('#modal_contenedor3').html(res);
            $('#myModal3').modal('show');
        },
        error: function(xhr, status, error) {
            alert("error");
            // Maneja errores si la solicitud AJAX falla
            console.error(error);
        }
   });
        }

        function estatus() {
            alert ("Cerrar sesion")
        }
    </script>
</body>

</html>