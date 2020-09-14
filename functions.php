<?php
function limpiarDatos($datos){
    $datos= trim($datos);  
    $datos= stripslashes($datos);
    $datos= htmlspecialchars($datos);   
    return $datos;
    }
function displayUsuario($usuario){
    if(!empty($usuario)){
        $display = $usuario;
    }else{
        $display = "";
    }
    return $display;
};

//function to get text from database and display it on client side  page
// $n parameter takes record number(first record = 0;) parametr
//$con takes $conexion from config PDO 
//reusable
function getContent($record,$conn){
    include "config.php";
    $text=$conn->prepare('SELECT * FROM text');
    $text->execute();
    $text=$text->fetchAll();
    return $text[$record]['description'];
};

function getTextContent($conn){
    $text=$conn->prepare("SELECT * FROM text");
    $text->execute();
    $text=$text->fetchAll();
    return $text;
}

function getContactInfo($conexion){
    $statement = $conexion -> query("SELECT * FROM contacto");
    $statement -> execute();
    $result = $statement->fetch();
    return $result;
}

?>