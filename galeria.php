<?php  



include('config.php');
include('functions.php');
$pageTitle = "Galeria";
include('views/header.php');


$fotos_por_pagina = 6;


$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);

$inicio = ($pagina_actual>1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0 ;

$statement = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM images LIMIT $inicio, $fotos_por_pagina");
$statement -> execute();
$fotos = $statement -> fetchAll();


if(!$fotos){
    echo "NO HAY FOTOS";
}

$statement = $conexion -> prepare("SELECT FOUND_ROWS() as total_filas");
$statement -> execute();
$total_post = $statement -> fetch()['total_filas'];
$total_paginas = ceil($total_post / $fotos_por_pagina);

 
include ('views/galeria.view.php');
include ('footer.logic.php');
?>