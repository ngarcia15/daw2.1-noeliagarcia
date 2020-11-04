
<?php
$numero=0;
if (isset($_REQUEST["numero"])) {
    $numero=(int)$_POST["numero"];
}

?>


<html>
<head>
    <meta charset='UTF-8'>
</head>

<body>


    <?Php
    if (isset($_REQUEST['sumar'])) {
        $numero++;
    }

    ?>
    <form action='' method='POST'>

    <p>El numero actual es el <?php echo $numero?></p>

    <input type='text' name='numero' />
    <input type='submit' name='sumar' value="sumar" />
</form>




</body>

</html>