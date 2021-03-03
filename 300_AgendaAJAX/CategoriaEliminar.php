<?php

require_once "_com/DAO.php";

$resultado = DAO::categoriaEliminarPorId($_REQUEST["id"]);

echo json_encode($resultado);
