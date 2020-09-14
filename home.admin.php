<?php   


session_start();
include('config.php');
include('functions.php');
$pageTitle ="Home";
include('views/header.admin.php');


if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}

///when form is submitted update the text in the database
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['textId'];
    $id = limpiarDatos(filter_var($id,FILTER_SANITIZE_NUMBER_INT));
    $text = $_POST['textContent'];
    // $text = limpiarDatos(filter_var($text,FILTER_SANITIZE_STRING));
    
    // echo $id;
    // echo $text;
    $statement = $conexion->prepare("UPDATE text SET description = :text WHERE id=:id");
    $statement->execute(array(
        ':text'=>$text,
        ':id'=>$id
    ));


}

function validarDatos ($textId, $content) {
    if($textId == ''){
        return false;
    }else if($content ==''){
        return false;
    }
    return true;
}
include "views/home.admin.view.php";





?>