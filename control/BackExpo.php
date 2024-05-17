<?php
include "conexion.php";
include "Login.php";

if (isset($_POST['insertar'])) {
    // Obtain the data for the new exhibitor
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];

    echo 'Expositor agregado correctamente'.$nombre;
    // Prepare and execute the SQL query to insert the new record
    $consulta = $conexion->prepare("INSERT INTO expositor (Nombre, Telefono, Facebook, Instagram, LinkedIn) VALUES (?, ?, ?, ?, ?)");
    $consulta->bind_param("sssss", $nombre, $telefono, $facebook, $instagram, $linkedin);

    // Execute the query and check for errors
    if ($consulta->execute()) {
        // Provide a response to the client if the insertion was successful
        echo 'Expositor agregado correctamente';
    } else {
        // Provide a response if there was an error during insertion
        echo 'Error al agregar el expositor: ' . $conexion->error;
    }
}

if (isset($_GET['editar'])) {
    $idExpositor = $_GET['editar'];
    
    // Realizar la consulta SQL para obtener los datos del expositor con el ID proporcionado
    $consulta = $conexion->prepare("SELECT * FROM expositor WHERE idExpositor = ?");
    $consulta->bind_param("i", $idExpositor);
    $consulta->execute();
    $resultado = $consulta->get_result();
    $expositor = $resultado->fetch_assoc();

    // Devolver los datos del expositor en formato JSON
    echo json_encode([
        'Nombre' => $expositor['Nombre'],
        'Telefono' => $expositor['Telefono'],
        'Facebook' => $expositor['Facebook'],
        'Instagram' => $expositor['Instagram'],
        'LinkedIn' => $expositor['LinkedIn']
    ]);
}
if (isset($_GET['editarconfirmar'])) {
    $idExpositor = $_GET['editarconfirmar'];
    $nombre = $_GET['nombre'];
    $telefono = $_GET['telefono'];
    $facebook = $_GET['facebook'];
    $instagram = $_GET['instagram'];
    $linkedin = $_GET['linkedin'];

    // Preparar y ejecutar la consulta SQL para actualizar los datos del expositor
    $consulta = $conexion->prepare("UPDATE expositor SET Nombre = ?, Telefono = ?, Facebook = ?, Instagram = ?, LinkedIn = ? WHERE idExpositor = ?");
    $consulta->bind_param("sssssi", $nombre, $telefono, $facebook, $instagram, $linkedin, $idExpositor);

    if ($consulta->execute()) {
        // Devolver una respuesta exitosa si la actualización fue exitosa
       // echo json_encode(['success' => true]);
    } else {
        // Devolver una respuesta de error si la actualización falló
       // echo json_encode(['success' => false, 'error' => $conexion->error]);
    }
}

if (isset($_GET['borrar']) && isset($_GET['idexpo'])) {
    // Obtener el ID del expositor a eliminar
    $idExpositor = $_GET['idexpo'];

    // Aquí deberías escribir el código para eliminar el expositor de la base de datos
    // Por ejemplo:
     $conexion->query("DELETE FROM expositor WHERE idExpositor = $idExpositor");

    // Devolver una respuesta al cliente si es necesario
    echo 'Expositor eliminado con éxito';
}
if (isset($_GET['impexpo'])) {

    // Consulta SQL para obtener los datos de los expositores
    $resultado = $conexion->query("SELECT * FROM expositor");

    // Inicio de la tabla HTML
    $salida = '<table class="table tabla table-bordered">
            <thead>
            <tr class="table-secondary">
            <th scope="col">Expositor</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Facebook</th>
            <th scope="col">Instagram</th>
            <th scope="col">LinkedIn</th>
            <th scope="col">Edición</th>
            </tr>
        </thead>
        <tbody id="content">';

    // Iterar sobre los datos obtenidos de la consulta
    while ($datos = $resultado->fetch_object()) {
        $salida .= '<tr>
            <th scope="col">' . $datos->Nombre . '</th>
            <th scope="col">' . $datos->Telefono . '</th>
            <th scope="col">' . $datos->Facebook . '</th>
            <th scope="col">' . $datos->Instagram . '</th>
            <th scope="col">' . $datos->LinkedIn . '</th>
            <th scope="col ft">
                <a type="button" class="btn btn-primary editar-btn" data-toggle="modal"  data-id="' . $datos->idExpositor . '">Editar</a> &nbsp; &nbsp;
                 <a type="button" class="btn btn-primary eliminar-btn" data-id="' . $datos->idExpositor . '">Eliminar</a>
        
            </th>
        </tr>';
    }

    // Fin de la tabla HTML
    $salida .= '</tbody>
            </table>';

    // Mostrar la tabla
    echo $salida;
}
  
if (isset($_GET['buscar'])) {
    $query = $_GET['buscar'];
    
    // Consulta SQL para buscar en todos los campos de la tabla de expositores
    $consulta = $conexion->prepare("SELECT * FROM expositor WHERE Nombre LIKE ? OR Telefono LIKE ? OR Facebook LIKE ? OR Instagram LIKE ? OR LinkedIn LIKE ?");
    $query = "%{$query}%"; // Agregar comodines para buscar coincidencias parciales
    $consulta->bind_param("sssss", $query, $query, $query, $query, $query);
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Generar la salida HTML con los resultados de la búsqueda
    $salida = '<table class="table tabla table-bordered">
            <thead>
            <tr class="table-secondary">
            <th scope="col">Expositor</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Facebook</th>
            <th scope="col">Instagram</th>
            <th scope="col">LinkedIn</th>
            <th scope="col">Edición</th>
            </tr>
        </thead>
        <tbody id="content">';

    while ($datos = $resultado->fetch_object()) {
        $salida .= '<tr>
            <th scope="col">' . $datos->Nombre . '</th>
            <th scope="col">' . $datos->Telefono . '</th>
            <th scope="col">' . $datos->Facebook . '</th>
            <th scope="col">' . $datos->Instagram . '</th>
            <th scope="col">' . $datos->LinkedIn . '</th>
            <th scope="col ft">
                <a type="button" class="btn btn-primary editar-btn" data-toggle="modal"  data-id="' . $datos->idExpositor . '">Editar</a> &nbsp; &nbsp;
                 <a type="button" class="btn btn-primary eliminar-btn" data-id="' . $datos->idExpositor . '">Eliminar</a>
        
            </th>
        </tr>';
    }

    $salida .= '</tbody>
            </table>';

    // Devolver los resultados de la búsqueda
    echo $salida;
}

  ?>