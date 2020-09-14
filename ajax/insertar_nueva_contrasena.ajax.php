<?php
//error_reporting(0);
//header('Content-Type: application/json; charset=utf-8');
require('../config.php');
require('../functions.php');


if(isset($_POST['password']) && isset($_POST['id'])){
    //$password = limpiarDatos($_POST['password']);
    $password = limpiarDatos(filter_var($_POST['password'],FILTER_SANITIZE_STRING));
    $password = hash('sha512',$password);
    //$id=limpiarDatos($_POST['id']);
    
    $id = limpiarDatos(filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT));
    $id=(int)$id;
    echo("id-". $id."\n"."pass-".$password);
}


//if(validarDatos($id, $password)){
    //$conexion->setCharset('utf8');
    $statement = $conexion->prepare('UPDATE usuarios SET  pass=:pass WHERE id=:id');
    $statement->execute(array(
        ':id'=> $id,
        ':pass'=> $password
        
    ));

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


