<?php
require_once "com/_Varios.php";
require_once "com/dao.php";

$id = (int)$_REQUEST["id"];
DAO::personaEstablecerEstadoEstrella($id);

redireccionar("PersonaListado.php");
?>