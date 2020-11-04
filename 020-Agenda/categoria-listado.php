<?php
	require_once "_varios.php";

	$pdo = obtenerPdoConexionBD();
	
	$sql = "SELECT id, nombre FROM categoria ORDER BY nombre";

    $select = $pdo->prepare($sql);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rs = $select->fetchAll();
?>



<html>

<head>
	<meta charset="UTF-8">
</head>



<body>

<h1>Listado de Categorías</h1>

<table border="1">

	<tr>
		<th>Nombre</th>
	</tr>

	<?php
        foreach ($rs as $fila) { ?>
			<tr>
				<td><a href=   "categoria-ficha.php?id=<?=$fila["id"]?>"> <?=$fila["nombre"] ?> </a></td>
				<td><a href="categoria-eliminar.php?id=<?=$fila["id"]?>"> (X)                   </a></td>
			</tr>
	<?php } ?>

</table>

<br />

<a href="categoria-ficha.php?id=-1">Crear entrada</a>

<br />
<br />

<a href="persona-listado.php">Gestionar listado de Personas</a>

</body>

</html>