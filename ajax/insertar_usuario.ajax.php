<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
require('../config.php');
require('../functions.php');

//  $usuario = limpiarDatos($_POST['usuario']);
//  $password = limpiarDatos($_POST['pass']);
//  $privilege = limpiarDatos($_POST['privilege']);


 //$usuario = $_POST['usuario'];
 $password = $_POST['pass'];
 $privilege = $_POST['privilege'];
 $usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
 $privilege = filter_var(strtolower($_POST['privilege']),FILTER_SANITIZE_STRING);
    
    $password = hash('sha512',$password);



if(ValidarDatos($usuario, $password, $privilege)){
    //$conexion->setCharset('utf8');
    $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass, privilege) VALUES (null, :usuario, :pass, :privilege )');
    $statement->execute(array(
        ':usuario'=> $usuario,
        ':pass'=> $password,
        ':privilege' => $privilege
    ));
   

}
function validarDatos ($user, $pass, $access) {
    if($user == ''){
        return false;
    }else if($pass ==''){
        return false;
    }else if($access ==''){
        return false;
    }
    return true;
}



?>


