<?php

session_start(); 
if(!$_SESSION['autenticado'] or $_SESSION['tipous']!=1){
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
    
    <title>Actividades Pasadas</title>
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
            <h2>ACTIVIDADES PASADAS</h2>
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
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='E-1.php';">CRONOGRAMA</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='E-2.php';">ACTIVIDADES</button>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>

<div class="funciones">

    <nav class="navbar bus">
        <a class="navbar-brand act">Carrera: </a>
            <input id="buscarcarrera" class="form-control mr-sm-2" type="buscar" placeholder="Carrera" style="width: 20rem;" aria-label="Search">
    </nav>

    <nav class="navbar bus">
        <a class="navbar-brand act">Actividad: </a>    
            <input id="buscaractividad" class="form-control mr-sm-2" type="buscar" placeholder="Actividad" style="width: 40rem;" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" id="btnbuscar">Buscar</button>
    </nav>
</div>

<div class="cont_tabla" id="actividcalificar">
    <!--AQUI VA LA TABLA DE ACTIVIDADES POR CALIFICAR-->
</div>


<!-- Modal -->
<div class="modal fade" id="calificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Calificar Actividad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class=" from1">
        <p class="clasificacion">
            <input id="radio1" type="radio" name="estrellas" value="5"><!--
            --><label class="label1" for="radio1">★</label><!--
            --><input id="radio2" type="radio" name="estrellas" value="4"><!--
            --><label class="label1" for="radio2">★</label><!--
            --><input id="radio3" type="radio" name="estrellas" value="3"><!--
            --><label class="label1" for="radio3">★</label><!--
            --><input id="radio4" type="radio" name="estrellas" value="2"><!--
            --><label class="label1" for="radio4">★</label><!--
            --><input id="radio5" type="radio" name="estrellas" value="1"><!--
            --><label class="label1"for="radio5">★</label>
        </p>
      </form>
      </div>
      <div class="modal-footer">
      <button type="button csv" id="btnguardar" class="btn  boton_personalizado"">Enviar Calificación</button>
        
      </div>
    </div>
  </div>
</div>

<footer class="footer_cerrar">
    <p> <br></p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script>

$(document).on('click', '.close', function() {
    $('#calificar').modal('hide');
});    

$(document).ready(function(){
    // Manejar el evento de clic en el botón para abrir la modal
    $(document).on('click', '.calificarboton', function() {
        $('#calificar').modal('show');
        // Obtener el ID de la actividad y asignarlo al botón de enviar calificación
        var idActividad = $(this).data("id");
        
        $("#btnguardar").data("id-actividad", idActividad);
    });

    // Enviar calificación por AJAX al hacer clic en el botón "Enviar Calificación"
    $(document).on('click', '#btnguardar', function(){
        var idActividad = $(this).data("id-actividad");
        var calificacion = $("input[name='estrellas']:checked").val();
        if (!calificacion) {
        // Mostrar mensaje de error o alerta al usuario
        alert("Por favor, selecciona al menos una estrella.");
        return; // Evitar enviar la calificación si no se ha seleccionado ninguna estrella
         }
        $.ajax({
            url: '../control/backCalif.php',
            type: 'POST',
            data: { idActividad: idActividad, calificacion: calificacion },
            success: function(response){
                console.log(response);
                 $('#calificar').modal('hide');
                confirmar();
                cargarTablaActividades('','');
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });
});
$(document).on('click', '#btnbuscar', function(){
    var carrera = $('#buscarcarrera').val().trim(); // Obtener valor del campo de búsqueda de carrera
    var nombreActividad = $('#buscaractividad').val().trim(); // Obtener valor del campo de búsqueda de actividad

    // Verificar si ambos campos están vacíos
    if (carrera === "" && nombreActividad === "") {
        // Si están vacíos, enviar la solicitud AJAX solo con el ID del usuario
        cargarTablaActividades();
    } 
    if (carrera === "" && nombreActividad !== "") {
        // Si están vacíos, enviar la solicitud AJAX solo con el ID del usuario
        cargarTablaActividades4(nombreActividad);
    }
    if (carrera != "" && nombreActividad === "") {
        // Si están vacíos, enviar la solicitud AJAX solo con el ID del usuario
        cargarTablaActividades3(carrera);
    }
    else {
        // Si al menos uno de los campos tiene valor, enviar la solicitud AJAX con los valores de los campos de búsqueda
        cargarTablaActividades2(carrera, nombreActividad);
    }
});
function cargarTablaActividades2(carrera, nombreActividad) {
                var idUsuario = <?php echo $id_usuario; ?>;
                // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de actividades
               
                $.ajax({
                    url: '../control/backCalif.php', // Ruta al archivo PHP que proporciona la tabla de actividades
                    method: 'GET',
                    data: {idUsuario: idUsuario, carrera: carrera, nombre_actividad: nombreActividad }, // Enviar el ID del usuario, carrera y nombre de actividad
                    success: function(data) {
                        
                        // Colocar los datos recibidos en el contenedor de la tabla de actividades
                        $('#actividcalificar').html(data);
                    }
                });
            }
function cargarTablaActividades3(carrera) {
                var idUsuario = <?php echo $id_usuario; ?>;
                // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de actividades
                $.ajax({
                    url: '../control/backCalif.php', // Ruta al archivo PHP que proporciona la tabla de actividades
                    method: 'GET',
                    data: {idUsuario: idUsuario, carrera: carrera}, // Enviar el ID del usuario, carrera y nombre de actividad
                    success: function(data) {
                        
                        // Colocar los datos recibidos en el contenedor de la tabla de actividades
                        $('#actividcalificar').html(data);
                    }
                });
            }
            function cargarTablaActividades4(nombreActividad) {
                var idUsuario = <?php echo $id_usuario; ?>;
                // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de actividades
                
                $.ajax({
                    url: '../control/backCalif.php', // Ruta al archivo PHP que proporciona la tabla de actividades
                    method: 'GET',
                    data: {idUsuario: idUsuario, nombre_actividad: nombreActividad }, // Enviar el ID del usuario, carrera y nombre de actividad
                    success: function(data) {
                        
                        // Colocar los datos recibidos en el contenedor de la tabla de actividades
                        $('#actividcalificar').html(data);
                    }
                });
            }
            function cargarTablaActividades() {
                var idUsuario = <?php echo $id_usuario; ?>;
                // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de actividades
                $.ajax({
                    url: '../control/backCalif.php', // Ruta al archivo PHP que proporciona la tabla de actividades
                    method: 'GET',
                    data: {idUsuario: idUsuario}, // Enviar el ID del usuario, carrera y nombre de actividad
                    success: function(data) {
                    
                        // Colocar los datos recibidos en el contenedor de la tabla de actividades
                        $('#actividcalificar').html(data);
                    }
                });
            }


        $(document).ready(function() {
            
            function cargarTablaActividades() {
                var idUsuario = <?php echo $id_usuario; ?>;
                // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de actividades
                $.ajax({
                    url: '../control/backCalif.php', // Ruta al archivo PHP que proporciona la tabla de actividades
                    method: 'GET',
                    data: {idUsuario: idUsuario}, // Enviar el ID del usuario, carrera y nombre de actividad
                    success: function(data) {
                        
                        // Colocar los datos recibidos en el contenedor de la tabla de actividades
                        $('#actividcalificar').html(data);
                    }
                });
            }


            // Llamar a la función para cargar la tabla de actividades cuando la página se carga inicialmente
            cargarTablaActividades();
            // Manejar el evento de clic en el botón de búsqueda
        });






    function esperarDosSegundos() {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve();
            }, 2000); // Espera 2 segundos
        });
    }
    async function confirmar(){
    const swalModal = Swal.fire({
        title: "Calificación guardada con éxito",
        background: "#a8a8a8",
        showConfirmButton: false,
        imageUrl: "https://cdn-icons-png.flaticon.com/512/1709/1709977.png",
        imageWidth: '200px'
    });
    $('#mf').modal('hide');
    await esperarDosSegundos();
    swalModal.close();
    }

</script>
</body>
</body>
<style>
.form1 {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

.form1 p {
  text-align: center;
}

.label1 {
  font-size: 6rem;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
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
.ft{
    display: flex;
    flex-flow: row;
    justify-content:space-between;

}
.funciones{
    display: flex;
    flex-flow: row;
    justify-content:center;
    
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

  }
.dropdown-menu {
    --bs-dropdown-padding-y: 0rem; 
    --bs-dropdown-font-size: 0rem; 
    --bs-dropdown-bg: transparent; 
    --bs-dropdown-border-color: transparent;
    }
</style>

</html>