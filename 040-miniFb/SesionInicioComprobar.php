<?php

require_once "_Varios.php";
$pdo= obtenerPdoConexionBD();

$identificador=$_REQUEST['identificador'];
$contrasenna=$_REQUEST['contrasenna'];


$arrayUsuario = obtenerUsuario($identificador, $contrasenna);

if ($arrayUsuario) { // HAN venido datos: identificador existía y contraseña era correcta.
   marcarSesionComoIniciada($arrayUsuario);
   redireccionar("ContenidoPrivado1.php");

    // TODO if (checkbox...) {
    //    generarCookieRecordar($arrayUsuario);
    //}

    // TODO Generar código cookie
    // TODO Crear cookie con el código
    // TODO Anotar código en BD
} else {
    redireccionar("SesionInicioMostrarFormulario.php");
}