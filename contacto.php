<?php  

include('config.php');
include('functions.php');




$pageTitle = "contacto";
include('views/header.php');

$errores="";
$enviado="";
$nombre='';
$apellido='';
$correo='';
$mensaje='';
$result =  getContactInfo($conexion);

if(isset($_POST['submit'])){
    $nombre=$_POST['first_name'];
    $apellido=$_POST['last_name'];
    $correo=$_POST['email'];
    $mensaje=$_POST['message'];

 ///validation//////

    if(!empty($nombre)){
        limpiarDatos($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else{
        $errores.= 'Por favor ingresa un nombre <br/>';
    }
    //----------
    if(!empty($apellido)){
        limpiarDatos($apellido);
        $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
    }else{
        $errores.= 'Por favor ingresa un apellido <br/>';
    }
    //--------------
    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if(!filter_var($correo,FILTER_SANITIZE_EMAIL)){
            $errores .= "Por favor ingresa un correo valido<br/>";
        }
    }else{
        $errores .= "Por favor ingresa un correo<br/>";
    }
    //-----------------------
    if(!empty($mensaje)){
        $mensaje=limpiarDatos($mensaje);
        
    }else{
        $errores .= "Por favor ingresa un mensaje";
    }

    // -------------SEND-----------------
    if(!$errores){
        $enviar_a = "siskajan@hotmail.com";
        $asunto ="Enviado desde mi pagina oscarvanegas.com";
        $mensaje_preparado = "De: $nombre $apellido \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje:  $mensaje" ;

        mail($enviar_a, $asunto, $mensaje_preparado);
        $enviado = true;
        // header("Location:contacto.php");
        // echo "enviado-<br>enviar a: $enviar_a <br>asunto: $asunto<br> mensaje: $mensaje_preparado ";

    }

}







include ('views/contacto.view.php');
include ('footer.logic.php');





?>