<?php
	require_once "_Varios.php";

	$conexionBD = obtenerPdoConexionBD();

	// Los campos que incluyo en el SELECT son los que luego podré leer
    // con $fila["campo"].
	$sql = "SELECT id, nombre FROM categoria ORDER BY nombre";

    $select = $conexionBD->prepare($sql);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rs = $select->fetchAll();

    // INTERFAZ:
    // $rs
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

<h1>Listado de Categorías</h1>

<table border='1'>

	<tr>
		<th>Nombre</th>
	</tr>

	<?php foreach ($rs as $fila) { ?>
        <tr>
            <td><a href=   'CategoriaFicha.php?id=<?=$fila["id"]?>'> <?=$fila["nombre"] ?> </a></td>
            <td><a href='CategoriaEliminar.php?id=<?=$fila["id"]?>'> (X)                   </a></td>
        </tr>
	<?php } ?>

</table>

<br />

<a href='CategoriaFicha.php?id=-1'>Crear entrada</a>

<br />
<br />

<a href='PersonaListado.php'>Gestionar listado de Personas</a>

</body>

</html>