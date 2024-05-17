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
    
    <title>Expositores</title>
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
            <h2>EXPOSITORES</h2>
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
                            <button type="button" class="btn btn-lg btn-primary btn_menu" onclick="window.location.href='A-02.php';">EVENTOS</button>
                        </li>
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
                        
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>

<div class="funciones">
    <button type="button csv" class="btn btn-lg boton_personalizado btn-primary" id="nuevboton" " data-target="#nue" >Nuevo</button>

    <nav class="navbar bus">
        <a class="navbar-brand act">Expositor: </a>
            <input class="form-control mr-sm-2 " id ="buscar-input" type="buscar" placeholder="Expositor" style="width: 60rem;" aria-label="Search">
            <button type="button" class="btn btn-outline-success my-2 my-sm-0" id="btn-buscar">Buscar</button>
    </nav>


</div>

<div class="cont_tabla">
    <table class="table tabla table-bordered">
    <thead>
    <div id="tabla_expositores"></div>
      
    <!--data-toggle="modal tabla de expositores -->    
        
    </tbody>
    </table>
</div>


<!-- Modal  EDITAR EXPOSITOR-->
<div class="modal fade" id="mf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Editar Expositor:</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Nombre: </a>
            <form class="form-inline" style="height: 40px;">
                <input id="editNombre" class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Telefono: </a>
            <form class="form-inline" style="height: 40px;">
                <input id="editTelefono" class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Facebook: </a>
            <form class="form-inline" style="height: 40px;">
                <input id="editFacebook" class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Instagram: </a>
            <form class="form-inline" style="height: 40px;">
                <input id="editInstagram" class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">LinkedIn: </a>
            <form class="form-inline" style="height: 40px;">
                <input id="editLinkedIn" class="form-control mr-sm-2" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
            </form>
        </nav>
      </div>
      <div class="modal-footer">
        <button type="button csv" id="btnguardar" class="btn  boton_personalizado" >Guardar</button>
        <button type="button " class="btn  boton_personalizado cancelar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="nue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Nuevo Expositor:</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Nombre: </a>
            <form class="form-inline" style="height: 40px;">
                <input class="form-control mr-sm-2 " id="innombre" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
                
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Telefono: </a>
            <form class="form-inline" style="height: 40px;">
                <input class="form-control mr-sm-2 " id="intelefono" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
                
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Facebook: </a>
            <form class="form-inline" style="height: 40px;">
                <input class="form-control mr-sm-2" id="infacebook" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
                
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">Instagram: </a>
            <form class="form-inline" style="height: 40px;">
                <input class="form-control mr-sm-2" id="ininstagram" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
                
            </form>
        </nav>
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style=" font-weight: bold;">LinkedIn: </a>
            <form class="form-inline" style="height: 40px;">
                <input class="form-control mr-sm-2" id="inlinkedin" type="buscar" placeholder="" aria-label="Search" style="height: 40px;">
                
            </form>
        </nav>
      </div>
      <div class="modal-footer">
      <button type="button csv" id="btnagregar" class="btn  boton_personalizado agregar-btn" >Agregar</button>
        <button type="button " class="btn  boton_personalizado cancelar" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>

<footer class="footer_cerrar">
    <p> <br></p>
</footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).on('click', '#nuevboton', function() {
    $('#nue').modal('show');
});    
$(document).on('click', '.editar-btn', function() {
    $('#mf').modal('show');
});  
$(document).on('click', '.close', function() {
    $('#nue').modal('hide');
    $('#mf').modal('hide');
});    
$(document).on('click', '.cancelar', function() {
    $('#nue').modal('hide');
    $('#mf').modal('hide');
});    

    $(document).on('click', '#btnagregar', function() {
    
    var nombre = $('#innombre').val();
    var telefono = $('#intelefono').val();
    var facebook = $('#infacebook').val();
    var instagram = $('#ininstagram').val();
    var linkedin = $('#inlinkedin').val();

    $.ajax({
        url: '../control/BackExpo.php',
        method: 'POST',
        data: {
            insertar: true,
            nombre: nombre,
            telefono: telefono,
            facebook: facebook,
            instagram: instagram,
            linkedin: linkedin
        },
        success: function(response) {
            // Handle success response if needed
            console.log(response);
            nueva();
            $('#nue').modal('hide');

            $('#innombre').val("");
            $('#intelefono').val("");
            $('#infacebook').val("");
            $('#ininstagram').val("");
            $('#inlinkedin').val("");
            cargarTablaExpositores();
            
        },
        error: function(xhr, status, error) {
            
            console.error(xhr.responseText);
        }
    });
});

var idexpoedit = 0;
          
$(document).on('click', '.editar-btn', function() {
    var idExpositoreditar = $(this).data('id');
    var exp_ed = "exp_ed";
    idexpoedit=idExpositoreditar;
    $.ajax({
        url: '../control/BackExpo.php',
        method: 'GET',
        data: {editar: idExpositoreditar},
        success: function(data) {
            data = JSON.parse(data);             
            console.log(data); 
            // Actualizar los campos de la modal con los datos recibidos
            //alert ('EL VALOR ES aaaaaaaaaaaaaaa'+idExpositoreditar);
            $('#editNombre').val(data.Nombre);
            $('#editTelefono').val(data.Telefono);
            $('#editFacebook').val(data.Facebook);
            $('#editInstagram').val(data.Instagram);
            $('#editLinkedIn').val(data.LinkedIn);
        },
        error: function(xhr, status, error) {
            // Manejar errores si es necesario
            console.error(xhr.responseText);
        }
    });
});
$(document).on('click', '#btnguardar', function() {
    var nombre = $('#editNombre').val();
    var telefono = $('#editTelefono').val();
    var facebook = $('#editFacebook').val();
    var instagram = $('#editInstagram').val();
    var linkedin = $('#editLinkedIn').val();
    
    $.ajax({
        url: '../control/BackExpo.php',
        method: 'GET',
        data: {editarconfirmar:  idexpoedit ,
            nombre: nombre,
            telefono: telefono,
            facebook: facebook,
            instagram: instagram,
            linkedin: linkedin
        },
        success: function(data) {             
            console.log(data); 
            $('#mf').modal('hide');
            cargarTablaExpositores();
            confirmar();
        
        },
        error: function(xhr, status, error) {
            // Manejar errores si es necesario
            console.error(xhr.responseText);
        }
    });
});

$(document).on('click', '.eliminar-btn', function() {
    // Obtener el ID del expositor desde el atributo data
    var idExpositor = $(this).data('id');
    ///alert('Función ejecutada. ID del expositor: ' + idExpositor);
    // Enviar una solicitud AJAX para eliminar el expositor
    $.ajax({
        url: '../control/BackExpo.php', 
        method: 'GET',
        data: { borrar: true, idexpo: idExpositor },
        success: function(data) {
            // Manejar la respuesta del servidor si es necesario
            console.log(data);
            // Volver a cargar la tabla de expositores después de eliminar uno
            cargarTablaExpositores();
            elimin();
        },
        error: function(xhr, status, error) {
            // Manejar errores si es necesario
            console.error(xhr.responseText);
        }
    });
});

$(document).on('click', '#btn-buscar', function() {
       // alert("HOLAAAAAAAAAAAA")
        event.preventDefault();
        var query = $('#buscar-input').val(); // Obtener el valor de búsqueda
        buscarExpositores(query); // Llamar a la función para buscar expositores
   
});

function cargarTablaExpositores() {
        var impexpo="impexpo";
        // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de expositores
        $.ajax({
            url: '../control/BackExpo.php', // Ruta al archivo PHP que proporciona la tabla de expositores
            method: 'GET',
            data: impexpo,
            success: function(data) {
                // Colocar los datos recibidos en el contenedor de la tabla de expositores
                $('#tabla_expositores').html(data);
            }
        });
    }

//ProyectoSEU/control/BackExpo.php'
$(document).ready(function() {
    
    function cargarTablaExpositores() {
        var impexpo="impexpo";
        // Realizar una solicitud AJAX al archivo PHP que proporciona la tabla de expositores
        $.ajax({
            url: '../control/BackExpo.php', // Ruta al archivo PHP que proporciona la tabla de expositores
            method: 'GET',
            data: impexpo,
            success: function(data) {
                // Colocar los datos recibidos en el contenedor de la tabla de expositores
                $('#tabla_expositores').html(data);
            }
        });
    }

    // Llamar a la función para cargar la tabla de expositores cuando la página se carga inicialmente
    $(document).ready(function() {
        cargarTablaExpositores();


    });

         
});
function buscarExpositores(query) {
    $.ajax({
        
        url: '../control/BackExpo.php', // Ruta al archivo PHP que maneja la búsqueda
        method: 'GET',
        data: { buscar: query }, // Enviar el parámetro de búsqueda al servidor
        success: function(data) {
            // Colocar los datos recibidos en el contenedor de la tabla de expositores
            $('#tabla_expositores').html(data);
        }
    });
}
    function esperarDosSegundos() {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve();
            }, 2000); // Espera 2 segundos
        });
    }
    async function confirmar(){
    const swalModal = Swal.fire({
        title: "Cambios guardados con éxito",
        background: "#a8a8a8",
        showConfirmButton: false,
        imageUrl: "https://cdn-icons-png.flaticon.com/512/1709/1709977.png",
        imageWidth: '200px'
    });
    $('#mf').modal('hide');
    await esperarDosSegundos();
    swalModal.close();
    }
    async function nueva(){
    const swalModal = Swal.fire({
        title: "Agredado con éxito",
        background: "#a8a8a8",
        showConfirmButton: false,
        imageUrl: "https://cdn-icons-png.flaticon.com/512/1709/1709977.png",
        imageWidth: '200px'
    });
    await esperarDosSegundos();
    swalModal.close();
    }

  
    async function elimin(){
        const swalModal = Swal.fire({
            title: "Expositor eliminado",
            background: "#a8a8a8",
            showConfirmButton: false,
            imageUrl: "https://static.vecteezy.com/system/resources/previews/023/254/343/large_2x/cross-sign-symbol-free-png.png",
            imageWidth: '200px'
        });
        await esperarDosSegundos();
        swalModal.close();
    }
</script>
</body>
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
    --bs-dropdown-padding-y: 0rem; 
    --bs-dropdown-font-size: 0rem; 
    --bs-dropdown-bg: transparent; 
    --bs-dropdown-border-color: transparent;
    }
</style>

</html>