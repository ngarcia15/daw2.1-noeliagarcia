<?php
	require_once "_varios.php";

	$pdo = obtenerPdoConexionBD();

	// Se recogen los datos del formulario de la request.
	$id = (int)$_REQUEST["id"];
	$nombre = $_REQUEST["nombre"];

	// Si id es -1 quieren CREAR una nueva entrada ($nueva_entrada tomará true).
	// Sin embargo, si id NO es -1 quieren VER la ficha de una categoría existente
	// (y $nueva_entrada tomará false).
	$nueva_entrada = ($id == -1);
	
	if ($nueva_entrada) {
		// Quieren CREAR una nueva entrada, así que es un INSERT.
 		$sql = "INSERT INTO categoria (nombre) VALUES (?)";
 		$parametros = [$nombre];
	} else {
		// Quieren MODIFICAR una categoría existente y es un UPDATE.
 		$sql = "UPDATE categoria SET nombre=? WHERE id=?";
        $parametros = [$nombre, $id];
 	}
 	
    $sentencia = $pdo->prepare($sql);
    //Esta llamada devuelve true o false según si la ejecución de la sentencia ha ido bien o mal.
    $sql_con_exito = $sentencia->execute($parametros); // Se añaden los parámetros a la consulta preparada.

 	//Se consulta la cantidad de filas afectadas por la ultima sentencia sql.
 	$una_fila_afectada = ($sentencia->rowCount() == 1);
 	$ninguna_fila_afectada = ($sentencia->rowCount() == 0);
 	
 	// Está todo correcto de forma normal si NO ha habido errores y se ha visto afectada UNA fila.
 	$correcto = ($sql_con_exito && $una_fila_afectada);

 	// Si los datos no se habían modificado, también está correcto.
 	$datos_no_modificados = ($sql_con_exito && $ninguna_fila_afectada);
?>



<html>

<head>
	<meta charset="UTF-8">
</head>



<body>

<?php
	// Todo bien tanto si se han guardado los datos nuevos como si no se habían modificado.
	if ($correcto || $datos_no_modificados) { ?>

		<?php if ($id == -1) { ?>
			<h1>Inserción completada</h1>
			<p>Se ha insertado correctamente la nueva entrada de <?php echo $nombre; ?>.</p>
		<?php } else { ?>
			<h1>Guardado completado</h1>
			<p>Se han guardado correctamente los datos de <?php echo $nombre; ?>.</p>

			<?php if ($datos_no_modificados) { ?>
				<p>En realidad, no había modificado nada, pero no está de más que se haya asegurado pulsando el botón de guardar :)</p>
			<?php } ?>
		<?php }
?>

<?php
	} else {
?>

	<h1>Error en la modificación.</h1>
	<p>No se han podido guardar los datos de la categoría.</p>

<?php
	}
?>

<a href="categoria-listado.php">Volver al listado de categorías.</a>

</body>

</html>