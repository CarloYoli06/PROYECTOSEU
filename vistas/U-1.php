<html>
<head>
    <title>Iniciar Sesion</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="./assets/1.png">
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
    <link rel="stylesheet" type="text/css" href="css/Estilo_formulario.css" th:href="@{/css/Estilo_formulario.css}">
</head>


<body>
    <header class="header">
        <img class="imgcabeza" src="img/cabeza.png">
    </header>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/escudo.png" >
                </div>
                <h1>Autentificación para acceso al sistema</h1>
                <form class="col-12" method="post" action="/ProyectoSEU/control/Login.php">
                    
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Numero de control" name="nc"/>
                    </div>
                    <div class="form-group" id="contraseña-group">
                        <input type="password" class="form-control" placeholder="password" name="contra"/>
                    </div>
                    <button type="submit" class="btn btn-warning" name="btn"><i class="fas fa-sign-in-alt"></i>
                        ingresar
                    </button>
                </form>
            </div>

        </div>

    </div>
    
</body>
</html>