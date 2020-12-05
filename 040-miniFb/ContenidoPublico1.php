<?php
require_once "_Varios.php";
if (haySesionIniciada()) {
    echo "$_SESSION[identificador]";
    echo "<a href='SesionCerrar.php'>Cerrar Sesion</a>";
}

    // TODO: En esta página, si hay sesión iniciada, mostrar la info y si no poner un link para iniciar sesión,
    // pero cualquiera puede verla, tenga sesión iniciada o no.


?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<h1>Contenido Público 1</h1>

<p>Nulla id sagittis nisl, vel mattis sapien. Nam rutrum erat in odio imperdiet, nec bibendum ligula euismod. Nulla vitae pharetra augue, at porttitor nisi. Quisque ut nisi cursus enim porta sollicitudin at dignissim arcu. Curabitur velit nisi, eleifend id tempus sed, auctor sit amet mi. Vestibulum vulputate dui non dui tincidunt pellentesque. Sed quam metus, aliquet in quam a, gravida tincidunt eros. Quisque elementum massa in eleifend viverra. Pellentesque at urna eget leo varius maximus.</p>
<p>Proin vitae dignissim libero, a pulvinar arcu. Pellentesque rhoncus fringilla orci, vitae fermentum felis maximus at. Vestibulum fermentum eu risus vel volutpat. Donec eget feugiat lectus. Praesent mauris est, eleifend a lacinia maximus, varius sed libero. Etiam pretium est id volutpat molestie. Maecenas semper ante at diam porttitor ullamcorper. Phasellus nec mollis ex. Donec posuere risus enim, feugiat tempus justo vehicula eu. Proin feugiat placerat luctus. Aliquam hendrerit, massa ut venenatis lacinia, lectus metus scelerisque elit, sit amet eleifend est augue id lectus. Maecenas rhoncus suscipit ligula et facilisis. Mauris et imperdiet magna, ultricies semper magna. Vestibulum porttitor sed arcu ac ornare.</p>
<p>Sed dapibus arcu finibus, maximus justo eget, vestibulum turpis. Ut ut nibh egestas metus pretium pretium. Nulla efficitur vel mi quis rutrum. Nunc a condimentum nisl. Etiam venenatis efficitur dictum. Quisque a velit in mauris congue scelerisque a aliquet massa. Integer ultrices molestie nulla non dictum.</p>

<a href='ContenidoPrivado1.php'>Ir al Contenido Privado 1</a>

<a href='ContenidoPrivado2.php'>Ir al Contenido Privado 2</a>

<a href='SesionInicioMostrarFormulario.php'>Iniciar Sesion</a>


</body>

</html>