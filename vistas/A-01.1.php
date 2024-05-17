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
    
    <title>Nuevo Evento</title>
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
            <h2>&nbsp NUEVA ACTIVIDAD</h2>
        </div>
        
    </div>
    
    <div  style="text-align: right;display: flex;background-color:white">
    <button type="button csv" class="btn btn-lg boton_personalizado btn-primary " onclick="window.location.href='A-02.1.php';">VOLVER</button>
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
<form >
    
<div class="funciones">


        
        <nav class="navbar bus" style="height: 40px; background-color: #FFFFFF;">
            <a class="navbar-brand act" style="font-size: smaller; font-weight: bold;">Carrera: </a>
            
                <select name="carrera" id="carrera" required>
                    <!--LLenado del select de carrera-->
                    <?php

                    $sql = "SELECT id_carrera, nombre from carrera" ;
                    $resultado = $conexion->query($sql);
                    $num_rows = $resultado->num_rows;
                    if($num_rows >0){
                        while($row = $resultado->fetch_array()){
                            echo '<option value="'.$row['id_carrera'].'">'.$row['nombre'].'</option> ';
                        }
                    }
                    ?>
                    
                </select>
            
        </nav>



    </div>

    <button type="button" name="crear_evento" id="crear_evento" class="btn btn-lg boton_personalizado btn-primary " style="height: 60px; margin-left: 25%" onclick="window.location.href='A-02-1.php';">Crear actividad</button>

</div>
</form>
<form>
<!-- action="../control/ActividadNueva.php" method="post" -->

<div class="funciones">

    <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(1, 1fr); margin-bottom: 0px;">
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(2, 1fr);">

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Nombre: </a>
               
                    <input class="form-control mr-sm-2" id="nombreA" name="nombreA" type="buscar"  placeholder="" aria-label="Search" style="width: 300px;">
                    
               
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Lugar: </a>
                
                    <input class="form-control mr-sm-2" id="lugarA" name="lugarA" type="buscar"  placeholder="" aria-label="Search" style="width: 300px;">
                    
                
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Tipo: </a>
                
                    <select name="tipoA" id="tipoA" >
                        
                    <option value="C">Club</option>
                    <option value="T">Taller</option> 
                            
                    </select>
                
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Capacidad: </a>
               
                    <input class="form-control mr-sm-2" id="capacidadA" name="capacidadA"  type="number"  placeholder="" aria-label="Search" style="width: 300px;">
                    
                
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Fecha: </a>
               
                    <input class="form-control mr-sm-2" id="fechaA" name="fechaA" type="date"  placeholder="" aria-label="Search" style="width: 300px;">
                    
                
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Expositor: </a>
               
                    
                    <select name="expositorA" id="expositorA"  >
                    <!--LLenado del select de exposito-->
                    <?php

                    $sql = "SELECT idexpositor, nombre from expositor" ;
                    $resultado = $conexion->query($sql);
                    $num_rows = $resultado->num_rows;
                    if($num_rows >0){
                        while($row = $resultado->fetch_array()){
                            echo '<option value="'.$row['idexpositor'].'">'.$row['nombre'].'</option> ';
                        }
                    }
                    ?>

                    </select>
               
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Horario inicio: </a>
                
                    <input class="form-control mr-sm-2" id="inicioA" name="inicioA" type="time"  placeholder="" aria-label="Search" style="width: 300px;">
                    
                
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Horario fin: </a>
                
                    <input class="form-control mr-sm-2" id="finA" name="finA" type="time"  placeholder="" aria-label="Search" style="width: 300px;">
                    
                
            </nav>
            
            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Asistencia obligatoria </a>
                <input class="form-check" type="checkbox" id="asistenciaA" name="asistenciaA" value="1"   style="width: 210px;" />
            </nav>
            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Evento: </a>
               
                    
                    <select name="EventoA" id="EventosA"  >
                    <!--LLenado del select de exposito-->
                    <?php

                    $sql = "SELECT id_evento, nombre from evento" ;
                    $resultado = $conexion->query($sql);
                    $num_rows = $resultado->num_rows;
                    if($num_rows >0){
                        while($row = $resultado->fetch_array()){
                            echo '<option value="'.$row['idexpositor'].'">'.$row['nombre'].'</option> ';
                        }
                    }
                    ?>

                    </select>
               
            </nav>
        </div>

        <div>
        
            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Descripción: </a>
               
                    <input class="form-control mr-sm-2" type="buscar" id="descripcionA" name="descripcionA"  placeholder="" aria-label="Search" style="width: 900px; background-color: #d6d6d6; height: 150px;">
                
            </nav>

            <nav class="navbar bus" style="background-color: #FFFFFF;">
                <a class="navbar-brand act" style="font-size: large; font-weight: bold;">Profesores: </a>
                
                    <input class="form-control mr-sm-2" type="buscar" id="profesor"  aria-label="Search" style="width: 900px; background-color: #d6d6d6; height: 50px;" >
                   
                    <div class="cont_tabla">
            <table class="table tabla table-bordered" id="tablaProfesores" >
            <thead>
                <tr class="table-secondary">
                <th scope="col">Número de control</th>
                <th scope="col">Profesor</th>
                <th scope="col">Asignado</th>
                </tr>
            </thead>
            <tbody id="content" >
    
        

            </tbody>
            </table>
                </div>
                    
            </nav>

            <!--<button type="button csv" class="btn btn-lg boton_personalizado btn-primary ">Asignar profesores</button> -->
        </div>
    </div>


</div>

<button type="button" name="nueva_actividad" id="nueva_actividad" class="btn btn-lg boton_personalizado btn-primary " style="height: 60px; margin-left: 25%">Crear evento</button>
    
</form>





<footer class="footer_cerrar">
    <p> <br></p>
</footer>


<script src="js/bootstrap.bundle.min.js"></script>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
        
    


        document.getElementById("profesor").addEventListener("keyup", tablaProfesores)
        document.getElementById("nueva_actividad").addEventListener("click", ActividadNueva)

      

        
            
            tablaProfesores()

            function tablaProfesores(){
                let content =document.getElementById("content")
                let url = "../control/tablaProfesor.php"
                let profesor = document.getElementById("profesor").value
                let formadata = new FormData()
                
                formadata.append("profesor",profesor)
                fetch(url, {
                        method: "POST",
                        body: formadata,
                }).then(Response => Response.json())
                .then(data =>{
                    content.innerHTML= data
                }).catch(err =>console.log(err))
            }

            function ActividadNueva(){
                
                let evento = document.getElementById("evento").value
                let inicio = document.getElementById("inicio").value
                let fin =document.getElementById("fin").value
                let carrera =document.getElementById("carrera").value
                let nombreA = document.getElementById("nombreA").value
                let lugarA =document.getElementById("lugarA").value
                let tipoA =document.getElementById("tipoA").value
                let capacidadA = document.getElementById("capacidadA").value
                let inicioA =document.getElementById("inicioA").value
                let finA =document.getElementById("finA").value
                let expositorA =document.getElementById("expositorA").value
                let fechaA = document.getElementById("fechaA").value
                let asistenciaA = document.getElementById("asistenciaA").value
                let descripcionA =document.getElementById("descripcionA").value
                let conten =document.getElementById("conten")

                let url = "../control/ActividadNueva.php"
                let formadata = new FormData()
                formadata.append("evento",evento)
                formadata.append("inicio",inicio)
                formadata.append("fin",fin)
                formadata.append("carrera",carrera)
                formadata.append("nombreA",nombreA)
                formadata.append("lugarA",lugarA)
                formadata.append("tipoA",tipoA)
                formadata.append("capacidadA",capacidadA)
                formadata.append("inicioA",inicioA)
                formadata.append("finA",finA)
                formadata.append("expositorA",expositorA)
                formadata.append("fechaA",fechaA)
                formadata.append("asistenciaA",asistenciaA)
                formadata.append("descripcionA",descripcionA)
                
                fetch(url, {
                        method: "POST",
                        body: formadata,
                }).then(Response => Response.json())
                .then(data =>{
                    conten.innerHTML= data
                }).catch(err =>console.log(err))

                const evento2 =  document.getElementById("evento")
                const inicio2 = document.getElementById("inicio")
                const fin2 =document.getElementById("fin")
                const carrera2 = document.getElementById("carrera")
                const nombre = document.getElementById("nombreA")
                const lugar =document.getElementById("lugarA")
                const tipo =document.getElementById("tipoA")
                const capacidad = document.getElementById("capacidadA")
                const horainicio =document.getElementById("inicioA")
                const horafin =document.getElementById("finA")
                const expositor =document.getElementById("expositorA")
                const fecha = document.getElementById("fechaA")
                const descripcion =document.getElementById("descripcionA")
                const tableP =document.getElementById("tablaProfesores")
                const asistencia =document.getElementById("asistenciaA")
                
                evento2.disabled = true
                inicio2.disabled = true
                fin2.disabled = true
                carrera2.disabled = true
                nombre.value=""
                lugar.value=""
                tipo.value=""
                capacidad.value=""
                horainicio.value=""
                horafin.value=""
                expositor.value=""
                fecha.value=""
                descripcion.value=""
                tableP.value=""
                asistencia.value=""
                
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