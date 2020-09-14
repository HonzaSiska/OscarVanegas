<?php
//session_start();
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
require('../config.php');
require('../functions.php');

if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
};


       


        
//         $id = $_POST['id'];
//         $acceso=$_POST['acceso'];
        
//         $id=(int)$id;
//         $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
//         $acceso = filter_var(strtolower($acceso,FILTER_SANITIZE_STRING));
//         echo " || THIS IS ID". $id;
//         echo " || THIS IS ACCESO". $acceso;
        
//         if($acceso=='admin'){
//             $acceso='user';
//         }else{
//             $acceso='admin';
//         }


//         if(ValidarDatos($id,$acesso)){

            
//             $statement = $conexion->prepare('UPDATE usuarios SET privilege = :privilege WHERE id = :id');
//             $statement->execute(array(
//                 ':id'=>$id,
//                 ':privilege'=>$acceso
//             ));  
            
            
            
//             echo "acceso succesfully updated";

//         }else{
//             //echo "empty fields";
//         }

        
        
        
// }else{
//     echo"not set session";
// }

// function validarDatos ($userId,$userAcceso) {
//     if($userId == ''){
//         return false;
//     }else if($userAcceso == ''){
//         return false;
//     }
//     return true;


$id = $_POST['id'];
$acceso=$_POST['acceso'];



if(!validarDatos($id, $acceso)){
    header('Location:login.php');
}

$id = filter_var($id,FILTER_SANITIZE_STRING);
$id=(int)$id;
$acceso = filter_var(strtolower($acceso)); 
 


if($acceso=="user"){
    $acceso="admin";
    $statement = $conexion->prepare('UPDATE usuarios SET privilege = :privilege WHERE id = :id');
    $statement->execute(array(
    ':id'=>$id,
    ':privilege'=>$acceso
    ));
}else if($acceso=="admin"){
  $acceso="user";
  $statement = $conexion->prepare('UPDATE usuarios SET privilege = :privilege WHERE id = :id');
  $statement->execute(array(
    ':id'=>$id,
    ':privilege'=>$acceso
    ));
}


function validarDatos($userId, $userAcceso) {
    if($userId == '' ||  $userAcceso==''){
        return false;
    }
    return true;
}




?>