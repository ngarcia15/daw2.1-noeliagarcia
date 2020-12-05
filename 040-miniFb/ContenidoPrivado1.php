<?php

    require_once "_Varios.php";

    // TODO Hay que comprobar si hay sesión-usuario iniciada.
    //   - Si la hay, no intervenimos. Dejamos que la pág se cargue.
    //     (Mostrar info del usuario logueado y tal...)
    //   - Si NO la hay, redirigimos a SesionInicioMostrarFormulario.php
    // (Organizar estas comprobaciones en funciones en _Varios.php para evitar copypaste.)

    if (!haySesionIniciada()) {
        header("location:SesionInicioMostrarFormulario.php");


    }
    echo "<h1>Bienvenido</h1>";
    echo "$_SESSION[identificador]";
    echo "<a href='SesionCerrar.php'>Cerrar Sesion</a>";



?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<h1>Contenido Privado 1</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat leo tempor, fringilla enim non, malesuada elit. Aenean odio justo, pretium sed nunc nec, eleifend faucibus nibh. Nulla egestas ut sapien eu venenatis. Donec semper turpis eu magna aliquet, ut lobortis nunc commodo. Aliquam id felis orci. Donec hendrerit pretium malesuada. Ut ultricies mi nec ullamcorper tincidunt. Suspendisse nec efficitur nisi. Morbi consequat feugiat urna, et sodales sem sollicitudin vitae. Morbi nibh metus, aliquam ut mattis non, efficitur eget urna. Quisque sodales tempus varius.</p>
<p>Aliquam iaculis, ex eu gravida vulputate, orci nibh elementum augue, sit amet lacinia purus quam non augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam sed mi at purus ornare molestie. Praesent cursus pharetra tortor. Aliquam sit amet interdum est. Pellentesque vehicula dapibus placerat. Cras eu lorem id lectus ultricies interdum ut non mauris. Suspendisse malesuada elit id magna varius, quis ullamcorper nibh hendrerit. Fusce elit enim, ornare non ante ac, rutrum pharetra nibh.</p>
<p>Aenean tempus risus elementum lacus dictum pellentesque. Curabitur dapibus laoreet consectetur. Nullam at velit vestibulum, viverra elit nec, pretium ex. In hac habitasse platea dictumst. Cras quis ex in est tristique elementum vel pretium ligula. Donec malesuada, felis vel pharetra ullamcorper, lorem est porttitor est, congue fringilla neque magna eget mi. Donec efficitur massa dolor, id interdum odio scelerisque vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur mattis porta odio eget fermentum. Integer faucibus libero diam, nec rhoncus nisl cursus ac. Donec massa mi, aliquam a libero quis, dictum hendrerit dolor. Duis scelerisque mauris in nibh lacinia, at tristique lorem pharetra. Ut egestas quam ac ligula aliquam, a ullamcorper tellus lobortis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec gravida ex sit amet tincidunt efficitur. Praesent at egestas felis.</p>

<a href='ContenidoPublico1.php'>Ir al Contenido Público 1</a>

<a href='ContenidoPrivado2.php'>Ir al Contenido Privado 2</a>

</body>

</html>