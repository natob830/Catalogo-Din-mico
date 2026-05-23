<?php
/**
 * Archivo de conexión a la base de datos MySQL
 * Contiene las credenciales y la configuración de conexión
 */

// Configuración de la conexión a la base de datos
//$servidor = "localhost";
//$usuario = "root";
//$contraseña = "";
//$basedatos = "sitio_personal";

// Configuración de la conexión a la base de datos dash.infinityfree.com - MYSQL

$servidor = "sql105.infinityfree.com";
$usuario = "if0_42000126";
$contraseña = "OsdpB8Z0Q5RgM";
$basedatos = "if0_42000126_natoBdata";

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $basedatos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres a utf8
mysqli_set_charset($conexion, "utf8");
?>
