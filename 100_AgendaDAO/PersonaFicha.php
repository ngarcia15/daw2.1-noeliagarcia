<?php
require_once "com/dao.php";


$id = (int)$_REQUEST["id"];

$nuevaEntrada = ($id == -1);

if ($nuevaEntrada) { // Quieren CREAR una nueva entrada, así que no se cargan datos.
    $personaNombre = "<introduzca nombre>";
    $personaApellidos = "<introduzca apellidos>";
    $personaTelefono = "<introduzca teléfono>";
    $personaEstrella = false;
    $personaCategoriaId = 0;
} else { // Quieren VER la ficha de una persona existente, cuyos datos se cargan.
    $persona = DAO::personaObtenerPorId($id);
    $personaNombre = $persona->getNombre();
    $personaApellidos = $persona->getApellidos();
    $personaTelefono = $persona->getTelefono();
    $personaEstrella = ($persona->getEstrella() == 1); // En BD está como TINYINT. 0=false, 1=true. Con esto convertimos a booolean.
    $personaCategoriaId = $persona->getCategoriaId();
}



// Con lo siguiente se deja preparado un recordset con todas las categorías.

$categorias = DAO::categoriaObtenerTodos();


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

    <form method='post' action='PersonaGuardar.php'>

        <input type='hidden' name='id' value='<?= $id ?>' />

        <label for='nombre'>Nombre</label>
        <input type='text' name='nombre' value='<?= $personaNombre ?>' />
        <br />

        <label for='apellidos'> Apellidos</label>
        <input type='text' name='apellidos' value='<?= $personaApellidos ?>' />
        <br />

        <label for='telefono'> Teléfono</label>
        <input type='text' name='telefono' value='<?= $personaTelefono ?>' />
        <br />
        <label for='estrella'>Estrellado</label>
        <input type='checkbox' name='estrella' <?= $personaEstrella ? "checked" : "" ?> />
        <br />
        <label for='categoriaId'>Categoría</label>
        <select name='categoriaId'>
            <?php
            foreach ($categorias as $categoria) {
                $categoriaId = (int) $categoria->getId();
                $categoriaNombre = $categoria->getNombre();

                if ($categoriaId == $personaCategoriaId) $seleccion = "selected='true'";
                else                                     $seleccion = "";

                echo "<option value='$categoriaId' $seleccion>$categoriaNombre</option>";
            }
            ?>
        </select>
        <br />

     

        <br />

        <?php if ($nuevaEntrada) { ?>
            <input type='submit' name='crear' value='Crear persona' />
        <?php } else { ?>
            <input type='submit' name='guardar' value='Guardar cambios' />
        <?php } ?>

    </form>

    <?php if (!$nuevaEntrada) { ?>
        <br />
        <a href='PersonaEliminar.php?id=<?= $id ?>'>Eliminar persona</a>
    <?php } ?>

    <br />
    <br />

    <a href='PersonaListado.php'>Volver al listado de personas.</a>

</body>

</html>