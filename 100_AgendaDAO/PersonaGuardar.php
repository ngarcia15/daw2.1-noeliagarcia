<?php
require_once "com/_Varios.php";
require_once "com/dao.php";

$id = (int)$_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$telefono = $_REQUEST["telefono"];
$categoriaId = (int)$_REQUEST["categoriaId"];
$estrella = isset($_REQUEST["estrella"]);


$datos= DAO::personaFicha($id);
$modificacionCorrecta= false;
$insercionCorrecta= false;
if($datos[0] == true) {
    $insercionCorrecta= DAO::personaCrear($nombre, $apellidos, $telefono, $estrella, $categoriaId);
} else {
    $modificacionCorrecta= DAO::personaGuardarPorId($id, $nombre, $apellidos, $telefono, $estrella, $categoriaId);
}
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<?php if ($modificacionCorrecta) { ?>
    <h1>Guardado completado</h1>
    <p>Se han guardado correctamente los datos de <?=$nombre?>.</p>
<?php } else if($insercionCorrecta) { ?>
    <h1>Inserción correcta</h1>
    <p>Se han insertado correctamente los datos de <?=$nombre?>.</p>
<?php } else { ?>
    <h1>Error en la modificación.</h1>
    <p>No se han podido guardar los datos de <?=$nombre?>.</p>
<?php } ?>

<a href='PersonaListado.php'>Volver al listado de personas.</a>

</body>

</html>
