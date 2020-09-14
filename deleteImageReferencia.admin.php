<?php 
session_start();
include('config.php');
include('functions.php');


if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}


    $id = (int)$_GET['id'];
    $id = limpiarDatos(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
    $imageId = (int)$_GET['imageId'];
    $imageId = limpiarDatos(filter_var($imageId, FILTER_SANITIZE_NUMBER_INT));
    $file = $_GET['deleteimg'];
    echo $id."ref id  : <br>";
    echo $imageId."image id : <br>";
    echo $file;
    if(empty($id) || empty($imageId) ||empty($file)){
        header("Location: referencias.admin.php");
     }else{
        $statement = $conexion->prepare("SELECT thumb FROM images WHERE id = :imageId");
        $statement ->execute(array(
            ':imageId'=> $imageId
        ));
        $result = $statement->fetch();
        echo "<br>fetched thumb:".$result[0];
    
        
/// this condition checks if somebody changed params in the url. If changed the id and thumb wont match and will be redirected
        if($result[0] !== $file){
            header("Location: referencias.admin.php");
            
        }else{
            $statement = $conexion->prepare("DELETE FROM images Where id=:id ");
            $statement ->execute(array(
                ':id'=> $imageId
            ));
            unlink("img/reference_img/".$result[0]);
            header("Location: singleReferencia.admin.php?id=".$id);

        }

        
     }
    
    


?>