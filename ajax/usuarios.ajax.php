<?php

header('Content-type: application/json; caherset=utf-8');

require('../config.php');

$query = $conexion->prepare('SELECT * FROM usuarios');

$query->execute();

$query = $query->fetchAll();

$resultado = json_encode($query);

print_r($resultado);
//echo $resultado[0];

?>