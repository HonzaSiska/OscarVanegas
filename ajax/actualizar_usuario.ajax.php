<?php
session_start();
//error_reporting(0);
//header('Content-Type: application/json; charset=utf-8');
require('../config.php');
require('../functions.php');


if(isset($_POST['id']) && isset($_POST['user'])){
    print_r($_POST['id']);
    $user = limpiarDatos(filter_var($_POST['user'],FILTER_SANITIZE_STRING));
    $id=(int)$id;
    $id = limpiarDatos(filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT));
    echo"id: ". $id ."\n";
    echo"id: ". $user ."\n";
    
    



// if(validarDatos($id, $user)){
    //$conexion->setCharset('utf8');
    $statement = $conexion->prepare('UPDATE usuarios SET usuario=:usuario WHERE id=:id');
    $statement->execute(array(
        ':id'=> $id,
        ':usuario'=> $user
        
    ));
    //session_destroy();
    // session_start();
    $_SESSION['usuario']=$user;
    // header("Location:../profile.php?id=". $id);
    //session_destroy();
}else{
    echo"error";
}

//}
function validarDatos ($userId, $pass) {
    if($userId == ''){
        return false;
    }else if($pass ==''){
        return false;
    }
    return true;
}


?>


