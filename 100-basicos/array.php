<?php

?>

<html>
<head></head>


<body>


<?php ?>
<select>
    <option> Elige una ciudad</option>
    <?php
    $listaCiudades=array("1 Barcelona","2 Madrid","3 Alicante","4 Valencia","5 Sevilla","6 Asturias");
    foreach ($listaCiudades as $ciudades){

    ?>
    <option> <?php echo $ciudades;?> </option>
    <?php } ?>
</select>


</body>
</html>