<?php
 session_start(); 
 session_destroy();  

?>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/Estilo_Fin.css">

</head>


<body>
    <header class="header">
        <img class="imgcabeza" src="img/cabeza.png">
    </header>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
            <p class="letra_ventana">Fin de sesión</p>
        <p> <br></p>
        <p> <br></p>
        <p class="letra_ventana">Iniciar de nuevo</p>
        <p> <br></p>
        <button type="button" class="btn btn-lg btn-primary boton_personalizado" onclick="window.location.href='U-1.php';" >Acceder</button>
            </div>

        </div>

    </div>
    <footer class="footer_cerrar">
        <p> <br></p>
    </footer>
</body>
<style>

</style>
</html>