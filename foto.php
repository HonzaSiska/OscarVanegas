<?php


include('config.php');
include('functions.php');

$id=$_GET['id'];
$id= (int)$id;
$id = limpiarDatos($id);
$pagina=$_GET['p'];


$pageTitle = "Photo";
include('views/header.php');


$statement = $conexion->query("SELECT * FROM images WHERE id= $id");
$result = $statement->fetch();
// echo $result['thumb'];





include ('views/foto.view.php');








