<?php
    require_once "com/dao.php";
    require_once "com/clases.php";
    require_once "com/_Varios.php";


    $categoria= DAO::CategoriaObtenerTodos();

   
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

	<?php foreach ($categoria as $fila) { ?>
        <tr>
            <td><a href='CategoriaFicha.php?id=<?=$fila->getId()?>'> <?=$fila->getNombre() ?> </a></td>
            <td><a href='CategoriaEliminar.php?id=<?=$fila->getId()?>'> (X)                   </a></td>
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