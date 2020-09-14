<?php
//error_reporting(0);
//header('Content-Type: application/json; charset=utf-8');
require('../config.php');
require('../functions.php');

 if(isset($_POST['id'])){
 $id = $_POST['id'];
 $id=(int)$id;
 $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
 echo "THIS IS ID". $id;
}

 else{
     echo 'No ID';
    }
 
if(ValidarDatos($id)){
    
    $statement = $conexion->prepare('DELETE FROM usuarios WHERE id = :id');
    $statement->execute(array(
        ':id'=>$id
    ));


}
function validarDatos ($userId) {
    if($userId == ''){
        return false;
    }
    return true;

}


?>


