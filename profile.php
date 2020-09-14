<?php 
session_start();
include('config.php');
include('functions.php');
//upload picture

//test
if(!isset($_SESSION['usuario'])){
    header('Location: admin.php');
}
$username = $_SESSION['usuario']; //logged in username
$error="";
//$id = $_GET['id'];
if(empty($_GET['id'])){
    $id=$_POST['userId'];
}else{
    $id = $_GET['id'];  
}
if(!$conexion){
    header('Location: admin.php');
    
}else{

    if (isset($_GET['id'])){
        $id = $_GET['id']; //id passed from the list of users by clicking on the user
        
    }else{
        $id= $_POST['userId'];
    }
    $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id= :id");
    $statement->execute(array(
        ':id'=> $id
    ));
    $result = $statement->fetch();
    $userNameFromDB = $result[1];
    $file = $result[4];
    
    if($userNameFromDB != $username ){
        header('Location: admin.php');
        echo 'no hay usuario';
    }
}   




/////IF FILE WAS SELECTED
if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_FILES) && isset($_POST['submit'])){
    $check = @getimagesize($_FILES['profile_picture']['tmp_name']);
    if($check !==false){
    $id=$_POST['userId'];
    $id=(int)$id;
    
    $carpeta = 'img/profile_img/';
    $archivo_subido = $carpeta . $_FILES['profile_picture']['name'];
    unlink("img/profile_img/".$file);
    move_uploaded_file($_FILES['profile_picture']['tmp_name'],$archivo_subido);
    $statement = $conexion->prepare('UPDATE usuarios SET thumb = :thumb WHERE id =:id');
    $statement->execute(array(
        ':thumb'=>$_FILES['profile_picture']['name'],
        ':id'=> $id
    ));
    header("Location: profile.php?id=".$id);

    ///IF NO FILE SELECTED
    } else {
        $id=$_POST['userId'];
        $id=(int)$id;
        header("Location: profile.php?id=".$id);
    }
}
    
    

$pageTitle="Profile: $username";  

include('views/header.admin.php');
include('views/profile.view.php');

?>