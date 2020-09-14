<?php
error_reporting(0);
header('Content-type: application/json; caherset=utf-8');
require('../config.php');
require('../functions.php');

// $text = ['test'=>'test'];
// $text = json_encode($text);
// echo $text;




$query = $conexion->prepare('SELECT * FROM usuarios');

$query->execute(
);

$query = $query->fetchAll();

$resultado = json_encode($query);

echo $resultado;


?>