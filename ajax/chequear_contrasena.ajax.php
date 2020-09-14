<?php
//error_reporting(0);
header('Content-type: application/json; caherset=utf-8');
require('../config.php');
require('../functions.php');



 
  


if(isset($_GET['id']) && isset($_GET['password'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $id =(int)$id;
    $password = filter_var($_GET['password'],FILTER_SANITIZE_STRING);
    $password = hash('sha512',$password);
    
    

    if(validarDatos($id,$password)){
        
        $query = $conexion->prepare('SELECT pass FROM usuarios WHERE id = :id');

        $query->execute(array(
            ':id'=> $id
        ));

        $query = $query->fetch();
        
        if($query[0]==$password){
            
            //$resultado = json_encode($resultado);
            $resultado = true;
            $resultado = json_encode($resultado);
            
        }else{
            $resultado = false;
            $resultado = json_encode($resultado);
            
        }

        print_r ($resultado);
        
    }else{
    
        header('Location: admin.php');
    }
}
function validarDatos ($id, $password) {
    if($id == ''){
        return false;
    }else if($password ==''){
        return false;
    }
    return true;
}
   
?>
    