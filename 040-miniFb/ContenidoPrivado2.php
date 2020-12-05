<?php
    require_once "_Varios.php";

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

<h1>Contenido Privado 2</h1>

<p>Praesent sit amet tincidunt nibh, quis gravida ligula. Maecenas vel efficitur ipsum, nec scelerisque turpis. Aliquam laoreet massa et augue sodales consequat. Nunc arcu nulla, malesuada interdum nunc sit amet, fermentum condimentum sem. Nam consectetur porttitor fringilla. Pellentesque ligula elit, molestie ac nisi ultricies, commodo porta turpis. Sed nec elit vitae elit pulvinar malesuada id non ex. In vulputate sapien vel auctor condimentum. Aliquam interdum tellus id eros sagittis pulvinar. Quisque sapien ipsum, pellentesque vel tortor vel, vestibulum sollicitudin dui.</p>
<p>Suspendisse eget pulvinar purus. Curabitur malesuada diam id orci porttitor, at tincidunt dolor fringilla. Duis bibendum nulla id venenatis ornare. Sed tempor auctor suscipit. Duis ut dui dui. Fusce ornare rutrum mi quis viverra. In blandit sodales rhoncus. Nam sodales, mi ut lobortis ornare, est lorem scelerisque dui, imperdiet placerat justo tortor vel ipsum. In placerat justo leo, et maximus mauris molestie in. Duis condimentum eros quis augue dictum consequat. Aliquam tincidunt egestas mollis.</p>
<p>Vestibulum risus leo, mattis sollicitudin libero sed, tincidunt posuere velit. Ut porttitor turpis id felis faucibus, sit amet pulvinar augue elementum. Curabitur vitae aliquet purus, sed scelerisque nisi. Phasellus maximus scelerisque sem, et venenatis sem dignissim eu. Etiam sit amet leo eu nisi volutpat rutrum et a nibh. Praesent purus sapien, tristique in mauris quis, volutpat vestibulum magna. Suspendisse nulla nisl, tristique vitae commodo eget, pulvinar sit amet sapien. Donec feugiat leo id urna scelerisque, et lobortis sapien dictum. Nullam neque eros, sollicitudin eget metus hendrerit, bibendum suscipit justo. Nam egestas efficitur consectetur. Pellentesque quis urna sem. Pellentesque ut tincidunt eros. Fusce finibus eros convallis, viverra elit in, dictum ligula. Aliquam erat volutpat. Suspendisse finibus, nisl sed tincidunt ullamcorper, orci sem iaculis arcu, ac porta nunc augue nec erat.</p>

<a href='ContenidoPublico1.php'>Ir al Contenido Público 1</a>

<a href='ContenidoPrivado1.php'>Ir al Contenido Privado 1</a>

</body>

</html>