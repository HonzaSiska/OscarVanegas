<?php 

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}

//validate if user clicked on link to his own profile


//echo $_SESSION['usuario'];


include('config.php');
$pageTitle="Admin";
include('views/header.admin.php');
include('views/admin.view.php');
?>
