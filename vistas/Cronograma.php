<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Cronograma de Actividades</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Pcontent.css">
</head>
<body>

<div class="p-3 mb-2 bg-warning text-warning-emphasis d-flex justify-content-between align-items-center">
    <!-- Columna izquierda para el menú desplegable -->
    
    <div class="col">
        <div class="btn-group">
            <button style="background-color: #FF6104; color: white; border-color: #FF6104;" 
            type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Opciones
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li><button class="dropdown-item" type="button">Another action</button></li>
                <li><button class="dropdown-item" type="button">Something else here</button></li>
            </ul>
        </div>
    </div>

    <!-- Columna central para el título -->
    <div class="col">
        <div id="tituloPer">
            <h2>Cronograma de actividades</h2>
        </div>
        
    </div>

    <!-- Columna derecha para el botón -->
    <div class="col">
        <div class="d-flex justify-content-end">
            <button id="verEventos" class="btn btn-primary" style="background-color: #FF6104; color: white; border-color: #FF6104;">Ver Eventos</button>
        </div>
    </div>
</div>

<div id="table-container" class="container-fluid">
    <table id="tablaActividades" class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th></th>
                <?php 
                include("../control/conexion.php");
                include('../control/SistemaActividades.php');
                generateWeekTable($conexion);
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
           
            
            ?>
        </tbody>
    </table>
</div>

<!-- Agregar controles de navegación por semana -->

<script src="js/bootstrap.bundle.min.js"></script>
<script>

</script>
</body
</html>
