<?php
session_start();

if($_SESSION["tema"]=='claro'){
    $_SESSION["tema"]= "noche";
}else{
    $_SESSION["tema"]= "claro";
}
redireccionar("personaListado.php")
?>