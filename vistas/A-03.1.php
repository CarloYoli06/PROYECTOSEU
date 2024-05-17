<?php
 session_start(); 
 if(!$_SESSION['autenticado'] or $_SESSION['tipous']!=2){
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
    
    <title>Escanear</title>
    <!-- Enlace a Bootstrap CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="./assets/1.png">
    
    

</head>
<script>
    var idActividad=0;
    
    
    function tabla(id){
        var ruta="t="+id;
        $.ajax({
                url: '/ProyectoSEU/control/backAsis.php',
                type: 'GET',
                data: ruta,
            })
            .done(function(res){
                $('#datos').html(res)
                
            })
            .fail(function(){
                console.log("error");
            })
            .always(function(){
                console.log("complete");
            });
    }

    function registrar(){
    var nct=$('#txt').val();
    var ruta="id="+<?php echo $_GET['id'];?>+"&nct="+nct;
    $.ajax({
        url: '/ProyectoSEU/control/backAsis.php',
        type: 'GET',
        data: ruta,
    })
    .done(function(res){
        // Llamar a la función tabla para actualizar la tabla con los nuevos datos
        tabla(<?php echo $_GET['id'];?>);
        $('#alerta').html(res); 
    })
    .fail(function(){
        console.log("error");
    })
    .always(function(){
        console.log("complete");
    });
}

     // Función para actualizar la hora cada segundo
        function actualizarHora() {
            var elementoHora = document.getElementById('hora');
            var ahora = new Date();
            var hora = ahora.getHours();
            var minutos = ahora.getMinutes();
            var segundos = ahora.getSeconds();

            // Añadir ceros a la izquierda si es necesario
            hora = (hora < 10 ? "0" : "") + hora;
            minutos = (minutos < 10 ? "0" : "") + minutos;
            segundos = (segundos < 10 ? "0" : "") + segundos;

            // Actualizar el contenido del elemento con la nueva hora
            elementoHora.innerHTML = hora + ":" + minutos + ":" + segundos;
        }

        // Actualizar la hora cada segundo
        setInterval(actualizarHora, 1000);

</script>
<body class="body_cerrar">
    <HEader>
        
    </HEader>
    <div class="text-warning-emphasis d-flex justify-content-between align-items-center" containe style="background-color:white">
    <!-- Columna izquierda para el menú desplegable -->
    <div class="col">
        <div id="tituloPer" style="background-color: #308BBE; color:white; font-weight: bold; padding-bottom:5px;padding-top:5px;max-width: 400px;">
            <h2>&nbsp Escanear</h2>
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
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-03.php';">EVENTOS</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-02.1.php';">ACTIVIDADES</button>
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

<div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(1, 1fr); margin-bottom: 0px;">

    <div class="funciones" style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 20px;">
        <?php $n=$_GET['n'];  
         $id=$_GET['id'];

         ?>
        <a class="navbar-brand act" style="font-weight: bold; text-align: center; font-size: 30px; height: 60px;"><?php echo $n;?></a>

        <button class="btn btn-outline-success my-2 my-sm-0" onclick="registrar2()" type="button" style="height: 60px;">Registrar</button>

        <a class="navbar-brand act" style="font-weight: bold; text-align: right; font-size: 30px;">Hora:</a>
        <a class="navbar-brand act" style="font-weight: normal; text-align: left; font-size: 30px;" id="hora"><?php echo date("H:i:s");?></a>
        
        
          <!-- AQUI VA LA CAMARA XD -->
        <video id="preview" style="margin-left:50px;"></video>
        <a></a>
        
        <input placeholder="No Ctrl" class="form-control mr-sm-2" type="text" aria-label="Search" id="txt">
        <a></a><a class="navbar-brand act" style="font-weight: bold; text-align: center; font-size: 30px;">Scanner conectado</a>

    </div>
    
    <div class="cont_tabla" id="datos">
        
        <table class="table tabla table-bordered">
        <thead>
            <tr class="table-secondary">
            <th scope="col" style="width: 150px;">No. Control</th>
            <th scope="col">Alumnos Registrados</th>
            </tr>
        </thead>
        <tbody id="content">
        <?php 
            include "../control/conexion.php";
                $id=$_GET['id'];
                $sql=$conexion->query("select a.noCtrl as nc,a.NOMBRE as nom, CONCAT(a.APELLIDOPAT,' ',a.APELLIDOMAT,' ',a.NOMBRE) as ape,a.carrera as ca,a.SEMESTRE as se,a.CORREO as co from alumnos a inner join alumnos_actividad aa on(a.noCtrl=aa.noCtrl) inner join actividad ac on(aa.id_EVENTO=ac.id_ACTIVIDAD) where ac.id_ACTIVIDAD=$id and aa.ASISTENCIA=1");
                while($datos=$sql->fetch_object()){
                    
                
                   
                ?>
            <tr>
                <th><?= $datos->nc?></th>
                <th><?= $datos->ape?></th>
            </tr>
            <?php  }?>

        </tbody>
        </table>
    </div>
    <div id="alerta"></div>
</div>
<?php 
echo "<script>  idActividad = $id; </script>"
?>
<footer class="footer_cerrar">
    <p> <br></p>
</footer>
<script>
                // Crear un objeto de escáner Instascan
                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                
                // Función que se ejecuta cada vez que se escanea un código QR
                scanner.addListener('scan', function(content) {
                    
                     // Enviar el contenido escaneado a otro archivo PHP usando AJAX
                     $.ajax({
                        url: '../control/RegistraAsistencia.php', // Reemplaza 'ruta_a_tu_archivo_php.php' con la ruta correcta
                        type: 'POST', // Método HTTP para enviar los datos
                        data: { codigo: content ,idact: idActividad}, // Datos a enviar, en este caso el contenido escaneado
                        success: function(response) {
                            // Manejar la respuesta del servidor
                            registrar();
                            
                            alert(response);
                            
                            console.log(response); 
                        },
                        error: function(xhr, status, error) {
                            // Manejar errores de la petición AJAX
                            console.error(xhr.responseText); // Imprimir mensaje de error en la consola del navegador
                        }
                    });
                });
                
                // Iniciar la cámara y comenzar a escanear
                Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No se encontró ninguna cámara en el dispositivo.');
                }
                }).catch(function(e) {
                console.error(e);
                });
            </script>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    function registrar2() {
    var nct = $('#txt').val().trim(); // Obtener el número de control del input existente

    // Verificar que se haya ingresado un número de control
    if (nct === "") {
        alert("Por favor ingresa un número de control.");
        return;
    }

    // Construir la ruta y los datos a enviar mediante AJAx
    
    $.ajax({
        url: '../control/RegistraAsistencia.php', // Reemplaza 'ruta_a_tu_archivo_php.php' con la ruta correcta
        type: 'POST', // Método HTTP para enviar los datos
        data: { codigo: nct ,idact: idActividad}, // Datos a enviar, en este caso el contenido escaneado
        success: function(response) {
              // Manejar la respuesta del servidor
        tabla(<?php echo $_GET['id'];?>);
        alert(response);
                            
        console.log(response); 
        },
        error: function(xhr, status, error) {
         // Manejar errores de la petición AJAX
        console.error(xhr.responseText); // Imprimir mensaje de error en la consola del navegador
         }
    });
}
</script>
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

  }
.dropdown-menu {
    --bs-dropdown-padding-y: 0rem; 
    --bs-dropdown-font-size: 0rem; 
    --bs-dropdown-bg: transparent; 
    --bs-dropdown-border-color: transparent;
    }
</style>

</html>