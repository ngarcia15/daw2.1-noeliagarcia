<?php

    require_once "_Varios.php";

    // Comprobamos si hay sesión-usuario iniciada.
    //   - Si la hay, no intervenimos. Dejamos que la pág se cargue.
    //     (Mostrar info del usuario logueado y tal...)
    //   - Si NO la hay, redirigimos a SesionInicioFormulario.php

    if (!haySesionRamIniciada() && !intentarCanjearSesionCookie()) {
        redireccionar("SesionInicioFormulario.php");
    }

?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<?php pintarInfoSesion(); ?>

<h1>Muro de ______</h1>

<p>/Aquí mostraremos los mensajes que hayan sido publicados para el usuario indicado como parámetro. Si no indican nada, veo los mensajes dirigidos a mí. Si indican otra cosa, veo los mensajes dirigidos a ese usuario.</p>

<a href='Index.php'>Ir al Contenido Público 1</a>

<a href='MuroVerGlobal.php'>Ir al Contenido Privado 1</a>

</body>

</html>