<?php

include("conexion.php");

if(isset($_POST["btn"])) {
    $nc = $_POST["nc"];
    $contra = $_POST["contra"];

    $sql = $conexion->prepare("CALL sp_inicio(?, ?)");
    $sql->bind_param("ss", $nc, $contra);
    $sql->execute();
    $sql->bind_result($regreso);
    $sql->fetch();
    $sql->close();

    acceso($conexion, $regreso, $nc);
}

function acceso($conexion, $regreso, $nc) {
    switch ($regreso) {
        case 0:
            header("location: /ProyectoSEU/vistas/U-1.php");
            break;
        case 1:
            $sql_alumno = "SELECT noCtrl, nombre FROM alumnos WHERE noCtrl = ?";
            $stmt_alumno = $conexion->prepare($sql_alumno);
            $stmt_alumno->bind_param("s", $nc);
            $stmt_alumno->execute();
            $stmt_alumno->bind_result($noCtrl, $nombre);
            $stmt_alumno->fetch();
            $stmt_alumno->close();
            session_start(); 
            $_SESSION['id_usuario'] = $noCtrl;
            $_SESSION['nombre_usuario'] = $nombre;
            $_SESSION['autenticado'] = true;
            echo "Usuario: $noCtrl<br>";
            echo "Nombre: $nombre<br>";
            header("location: /ProyectoSEU/vistas/E-1.php");
            //header("location: viewAlumno.html");
            break;
        case 2:
            $sql_admin = "SELECT id_personal, nombres FROM personal WHERE id_personal = ?";
            $stmt_admin = $conexion->prepare($sql_admin);
            $stmt_admin->bind_param("s", $nc);
            $stmt_admin->execute();
            $stmt_admin->bind_result($id_personal_admin, $nombres_admin);
            $stmt_admin->fetch();
            $stmt_admin->close();
            session_start(); 
            $_SESSION['id_usuario'] = $id_personal_admin;
            $_SESSION['nombre_usuario'] = $nombres_admin;
            $_SESSION['autenticado'] = true;
            echo "Usuario: $id_personal_admin<br>";
            echo "Nombre: $nombres_admin<br>";
            header("location: /ProyectoSEU/vistas/A-02.php");
            break;
        case 3:
            $sql_profesor = "SELECT id_personal, nombres FROM personal WHERE id_personal = ?";
            $stmt_profesor = $conexion->prepare($sql_profesor);
            $stmt_profesor->bind_param("s", $nc);
            $stmt_profesor->execute();
            $stmt_profesor->bind_result($id_personal_profesor, $nombres_profesor);
            $stmt_profesor->fetch();
            $stmt_profesor->close();
            session_start();
            $_SESSION['id_usuario'] = $id_personal_profesor;
            $_SESSION['nombre_usuario'] = $nombres_profesor;
            $_SESSION['autenticado'] = true;
            echo "Usuario: $id_personal_profesor<br>";
            echo "Nombre: $nombres_profesor<br>";
            header("location: /ProyectoSEU/vistas/D-1.php");
            break;
    }
}


?>

