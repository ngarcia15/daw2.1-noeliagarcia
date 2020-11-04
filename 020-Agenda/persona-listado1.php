<?php
require_once "varios.php";

$pdo = obtenerPdoConexionBD();

$sql = "SELECT id, nombre FROM persona ORDER BY nombre";

$select = $pdo->prepare($sql);
$select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
$rs = $select->fetchAll();
?>
<html>

<head>
    <meta charset="UTF-8">
</head>



<body>

<h1>Listado de Persona</h1>

<table border="1">

    <tr>
        <th>Nombre</th>
    </tr>

    <?php
    foreach ($rs as $fila) { ?>
        <tr>
            <td><a href=  "persona-ficha1.php?id=<?=$fila["id"]?>"> <?=$fila["nombre"] ?> </a></td>
            <td><a href="persona-eliminar1.php?id=<?=$fila["id"]?>"> (X)                   </a></td>
        </tr>
    <?php } ?>

</table>

<br />

<a href="persona-ficha1.php?id=-1">Crear entrada</a>

<br />
<br />

<a href="persona-listado1.php">Gestionar listado de Personas</a>

</body>

</html>
