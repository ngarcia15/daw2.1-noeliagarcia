<?php
    require_once "_Varios.php";

    if (haySesionIniciada()) redireccionar("ContenidoPrivado1.php");

    $datosErroneos = isset($_REQUEST["datosErroneos"]);
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<h1>Iniciar sesión</h1>

<?php if ($datosErroneos) { ?>
    <p style='color: red;'>No se ha podido iniciar sesión con los datos proporcionados. Inténtelo de nuevo.</p>
<?php } ?>

<form action='SesionInicioComprobar.php' method="post">
    <label for='identificador'>Identificador</label>
    <input type='text' name='identificador'><br><br>

    <label for='contrasenna'>Contraseña</label>
    <input type='password' name='contrasenna' id='contrasenna'><br><br>

    <label for='recordar'>Recuérdame aunque cierre el navegador</label>
    <input type='checkbox' name='recordar' id='recordar'><br><br>

    <input type='submit' value='Iniciar Sesión'>
</form>

</body>

</html>