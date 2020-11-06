<?php
	require_once "_varios.php";

	$conexion = obtenerPdoConexionBD();
	
	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	// Si id es -1 quieren CREAR una nueva entrada ($nueva_entrada tomará true).
	// Sin embargo, si id NO es -1 quieren VER la ficha de una persona existente
	// (y $nueva_entrada tomará false).
	$nuevaEntrada = ($id == -1);
	
	if ($nuevaEntrada) { // Quieren CREAR una nueva entrada, así que no se cargan datos.
		$personaNombre = "<introduzca nombre>";
        $personaApellidos = "<introduzca apellidos>";
		$personaTelefono = "<introduzca teléfono>";
        $personaCategoriaId = 0;
    } else { // Quieren VER la ficha de una persona existente, cuyos datos se cargan.
		$sqlPersona = "SELECT nombre, apellidos, telefono, categoriaId FROM persona WHERE id=?";

        $select = $conexion->prepare($sqlPersona);
        $select->execute([$id]); // Se añade el parámetro a la consulta preparada.
        $rsPersona = $select->fetchAll();

        // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
		$personaNombre = $rsPersona[0]["nombre"];
        $personaApellidos = $rsPersona[0]["apellidos"];
		$personaTelefono = $rsPersona[0]["telefono"];
		$personaCategoriaId = $rsPersona[0]["categoriaId"];
    }

	
	
	// Con lo siguiente se deja preparado un recordset con todas las categorías.
	
	$sqlCategorias = "SELECT id, nombre FROM categoria ORDER BY nombre";

    $select = $conexion->prepare($sqlCategorias);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rsCategorias = $select->fetchAll();



    // INTERFAZ:
    // personaNombre
    // personaApellidos
    // personaTelefono
    // personaCategoriaId
    // rsCategorias
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

<?php if ($nuevaEntrada) { ?>
	<h1>Nueva ficha de persona</h1>
<?php } else { ?>
	<h1>Ficha de persona</h1>
<?php } ?>

<form method='post' action='personaGuardar.php'>

<input type='hidden' name='id' value='<?= $id ?>' />

<ul>
	<li>
		<strong>Nombre: </strong>
		<input type='text' name='nombre' value='<?=$personaNombre ?>' />
	</li>

    <li>
        <strong> Apellidos: </strong>
        <input type='text' name='apellidos' value='<?=$personaApellidos ?>' />

    </li>
	
	<li>
		<strong>Teléfono: </strong>
		<input type='text' name='telefono' value='<?=$personaTelefono ?>' />
	</li>
		
	<li>
		<strong>Categoría: </strong>
		<select name='categoriaId'>
			<?php
                foreach ($rsCategorias as $filaCategoria) {
					$categoriaId = (int) $filaCategoria["id"];
					$categoriaNombre = $filaCategoria["nombre"];
					
					if ($categoriaId == $personaCategoriaId) $seleccion = "selected='true'";
					else                                     $seleccion = "";
					
					echo "<option value='$categoriaId' $seleccion>$categoriaNombre</option>";

					// Alternativa (peor):
                    // if ($categoriaId == $personaCategoriaId) echo "<option value='$categoriaId' selected='true'>$categoriaNombre</option>";
                    // else
                    //                                    echo "<option value='$categoriaId'                >$categoriaNombre</option>";
				}
                //<form action="/action_page.php">
            //  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
            //  <label for="vehicle1"> I have a bike</label><br>
            //  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
            //  <label for="vehicle2"> I have a car</label><br>
            //  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
            //  <label for="vehicle3"> I have a boat</label><br><br>
            //  <input type="submit" value="Submit">
            //</form>
			?>
		</select>
	</li>
</ul>

<?php if ($nuevaEntrada) { ?>
	<input type='submit' name='crear' value='Crear persona' />
<?php } else { ?>
	<input type='submit' name='guardar' value='Guardar cambios' />
<?php } ?>

</form>

<br />

<?php if (!$nuevaEntrada) { ?>
	<a href='personaEliminar.php?id=<?=$id ?>'>Eliminar persona</a>
<?php } ?>

<br />
<br />

<a href='personaListado.php'>Volver al listado de personas.</a>

</body>

</html>