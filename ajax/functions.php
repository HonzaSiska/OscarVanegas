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
}


?>