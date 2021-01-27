<?php
require_once "com/_Varios.php";
require_once "com/dao.php";

$id = (int)$_REQUEST["id"];
$nombre = $_REQUEST["nombre"];


$datos= DAO::categoriaFicha($id);
$modificacionCorrecta= false;
$insercionCorrecta= false;
if($datos[0] == true) {
    $insercionCorrecta= DAO::categoriaCrear($nombre);
} else {
    $modificacionCorrecta= DAO::categoriaGuardarPorId($id, $nombre);
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
    <p>No se han podido guardar los datos de la categoría.</p>
<?php } ?>

<a href='CategoriaListado.php'>Volver al listado de categorías.</a>

</body>

</html>