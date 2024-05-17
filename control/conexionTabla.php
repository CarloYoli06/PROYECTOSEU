<?php   


$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "seu";

$conexion = new mysqli($host,$usuario,$clave,$bd);

    class conexionTabla{
        public static function conectar(){
            define ('servidor','localhost');
            define('nombrebd','seu');
            define('usuario','root');
            define('password','');

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombrebd,usuario,password,$opciones);
                return $conexion;
            }catch(Exception $e){
                    die("el error de conexion es ". $e->getMessage());
            }
            

    }

}


