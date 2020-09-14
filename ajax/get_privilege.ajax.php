<?php
error_reporting(0);
header('Content-type: application/json; caherset=utf-8');
require('../config.php');
require('../functions.php');

// $text = ['test'=>'test'];
// $text = json_encode($text);
// echo $text;

function validarDatos ($user) {
    if($user == ''){
        return false;
    }
    return true;
}   


if(isset($_GET['usuario'])){
    $usuario = filter_var($_GET['usuario'],FILTER_SANITIZE_STRING);
    

    if(validarDatos($usuario)){
        
        $query = $conexion->prepare('SELECT privilege FROM usuarios WHERE usuario = :usuario');

        $query->execute(array(
            ':usuario'=> $usuario
        ));

        $query = $query->fetch();

        $resultado = json_encode($query);
        print_r($resultado);
        
    }else{
    
        header('Location: admin.php');
    }
}
    






// $usuario = $_GET['usuario'];
// $query = $conexion->prepare('SELECT privilege FROM usuarios WHERE usuario = :usuario');

//     $query->execute(array(
//         ':usuario'=> $usuario
//     ));

//     $query = $query->fetch();

//     $resultado = json_encode($query);
//     print_r($resultado);

 ?>