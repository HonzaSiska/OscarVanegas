<?php 

session_start();
include('config.php');
include('functions.php');
include('views/header.admin.php');
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}
//////////////////////////////////////////////////////////////////////////////
/// based on clicked nav button a page is loaded, title is taken from config.php
///////////////////////////////////////////////////////////

    

if(isset($_GET['title'])){
    $page= $_GET['title'];
}
if ($page=='home'){
    
    include $navigationAdmin[0]['link'];
}else if($page=='contacto'){
    echo "CONTACTO";
}
else if($page=='referencias'){
    echo "REFERENCIAS";
}else{
    echo "GALERIAS";
}

  



//echo $_SESSION['usuario'];
echo "<title>".$page."</title>";







?>