<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ventana Actividad</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="VentanaActividad.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    
</head>
<body>

<button type="button" class="btn btn-primary btn-lg boton_personalizado" data-bs-toggle="modal" data-bs-target="#myModal">Acceder</button>

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
          <img class="img_qr" src="imagenes\R.png" alt="QR">

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

</body>

<style>
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
.contenedor_imagen{
  background-color: #F15903;
  padding: 1em;
  border-radius: 1em;
  min-width: 20rem;
  min-height: 20rem;

}
.img_expositor{
  height: auto;
  min-width: 20rem;
  min-height: 20rem;
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


.modal_prin{
  --bs-modal-width:50%;

}

.footer_ventana{
  background-color: #308BBE;
}
.asistir{
  text-align: center;

}
</style>
</html>