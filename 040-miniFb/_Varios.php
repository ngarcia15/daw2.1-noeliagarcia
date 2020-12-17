<?php

declare(strict_types=1);

function obtenerPdoConexionBD(): PDO
{
    $servidor = "localhost";
    $bd = "MiniFb";
    $identificador = "root";
    $contrasenna = "";
    $opciones = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
    } catch (Exception $e) {
        error_log("Error al conectar: " . $e->getMessage()); // El error se vuelca a php_error.log
        exit('Error al conectar'); //something a user can understand
    }

    return $conexion;
}

function obtenerUsuario(string $identificador, string $contrasenna): ?array
{
    $pdo = obtenerPdoConexionBD();

    $sql="SELECT * FROM Usuario WHERE identificador=? AND contrasenna=?";
    $sentencia = $pdo->prepare($sql);
    $sqlBien = $sentencia->execute([$identificador,$contrasenna]);
    

    $FilaAfectada = ($sentencia->rowCount() == 1);
    $ningunaFilaAfectada = ($sentencia->rowCount() == 0);
    $correcto = ($sqlBien && $FilaAfectada);
    $noExiste = ($sqlBien && $ningunaFilaAfectada);

    if($correcto){
        $rs = $sentencia->fetchAll();
        return [
        "id" =>$rs[0]["id"],
        "identificador"=>$rs[0]["identificador"],
        "contrasenna"=>$rs[0]["contrasenna"]
        
    ];
    }else{
        return null;
    }
}

function marcarSesionComoIniciada(array $arrayUsuario)
{
    session_start();
    $_SESSION["id"] =$arrayUsuario["id"];
    $_SESSION["identificador"] =$arrayUsuario["identificador"];
   
}

function haySesionIniciada(): bool

{
    session_start();

  if(isset($_SESSION["id"])){
        $iniciada=true;
    }else{
        $iniciada=false;
    }
    return $iniciada;
    
}
function cerrarSesion()
{
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["identificador"]);
    session_destroy();

}
function establecerCookieRecuerdame(array $arrayUsuario)
{
    // TODO Enviamos al cliente, en forma de cookies, el código cookie y su identificador.
}

function generarCookieRecordar(array $arrayUsuario)
{
    // Creamos un código cookie muy complejo (no necesariamente único).
    $codigoCookie = generarCadenaAleatoria(32); // Random...

    // TODO guardar código en BD
    // Para una seguridad óptima convendría anotar en la BD la fecha de caducidad de la cookie y no aceptar ninguna cookie pasada dicha fecha.

    // TODO $arrayUsuario["codigoCookie"] = ...

    establecerCookieRecordar($arrayUsuario);
}

function borrarCookieRecordar(array $arrayUsuario)
{
    // TODO Eliminar el código cookie de nuestra BD.

    // TODO Pedir borrar cookie (setcookie con tiempo time() - negativo...)
}

function generarCadenaAleatoria($longitud): string
{
    for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != $longitud; $x = rand(0,$z), $s .= $a[$x], $i++);
    return $s;
}

// (Esta función no se utiliza en este proyecto pero se deja por si se optimizase el flujo de navegación.)
// Esta función redirige a otra página y deja de ejecutar el PHP que la llamó:
function redireccionar(string $url)
{
    header("Location: $url");
    exit;
}

function syso(string $contenido)
{
    file_put_contents('php://stderr', $contenido . "\n");
}