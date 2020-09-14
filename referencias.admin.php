<?php  

session_start();
include('config.php');
include('functions.php');
$pageTitle ="Referencias";
include('views/header.admin.php');


$error_box="";
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}
$referenceTitle="";
$text="";

////////////////////////////////////////////////
////////get all references to be displayed/////////
//////////////////////////////////////////////////

$query = $conexion->prepare("SELECT * FROM referencias");
$query -> execute();
$allReferences = $query->fetchAll();

///agregar nueva referencia////
//////////////////////////////////

if($_SERVER['REQUEST_METHOD']=='POST'){
    $referenceTitle = $_POST['title'];
    $text = $_POST['textContent'];
    $referenceTitle = filter_var($referenceTitle,FILTER_SANITIZE_STRING);
    $text = filter_var($text,FILTER_SANITIZE_STRING);
    //echo $referenceTitle;
    //echo $text;
    if(validarDatos($referenceTitle,$text)){
        //echo $referenceTitle;
        //echo $text;
        $statement = $conexion->prepare("INSERT INTO referencias (title, content)  VALUES (:rt, :text)");
        $statement->execute(array(
            ':rt' => $referenceTitle,
            ':text' => $text
        ));
        
        $id = $conexion->lastInsertId();
        //$id = $lastID[0];
        echo $lastID . "this is the array <br>";
        echo $id ."this is id fetched from array";
        header("Location: singleReferencia.admin.php?id=".$id);
    }else{
        $error_box="rellena todos los campos";
    }
}


include "views/referencias.view.php";


function validarDatos ($title, $content) {
    if($title == ''){
        
        return false;
        
    }else if($content ==''){
        
        return false;
    }
    return true;
}
?>
