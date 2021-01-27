<?php

	require_once "com/dao.php";

	$id = (int)$_REQUEST["id"];


	$nuevaEntrada = ($id == -1);

	if ($nuevaEntrada) { // Quieren CREAR una nueva entrada, así que no se cargan datos.
		$categoriaNombre = "<introduzca nombre>";
	} else { 
		$categoria = DAO::categoriaObtenerPorId($id);
		$categoriaNombre = $categoria->getNombre();
		}



?>



<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

<?php if ($nuevaEntrada) { ?>
	<h1>Nueva ficha de categoría</h1>
<?php } else { ?>
	<h1>Ficha de categoría</h1>
<?php } ?>

<form method='post' action='CategoriaGuardar.php'>

<input type='hidden' name='id' value='<?=$id?>' />

    <label for='nombre'>Nombre</label>
	<input type='text' name='nombre' value='<?=$categoriaNombre?>' />
    <br/>

    <br/>

<?php if ($nuevaEntrada) { ?>
	<input type='submit' name='crear' value='Crear categoría' />
<?php } else { ?>
	<input type='submit' name='guardar' value='Guardar cambios' />
<?php } ?>

</form>

<br />

<?php if (!$nuevaEntrada) { ?>
    <br />
    <a href='CategoriaEliminar.php?id=<?=$id?>'>Eliminar categoría</a>
<?php } ?>

<br />
<br />

<a href='CategoriaListado.php'>Volver al listado de categorías.</a>

</body>

</html>