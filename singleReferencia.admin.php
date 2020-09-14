<?php


session_start();
include('config.php');
include('functions.php');
$pageTitle="Referencia";
include('views/header.admin.php');
$pageTitle="Referencia";
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}
$counter = 0;

/////////////////////////////
///GET reference///////
///////////////////////////
if(isset($_GET['id']) ){
    $id = $_GET['id'];
    //echo "received id:".$id;
    $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
    
    if(validarDatos($id)){
    
        ///get reference by id
        $statement = $conexion->prepare("SELECT * FROM referencias WHERE id = :id");
        $statement->execute(array(
            ':id'=>$id
        ));
        $result = $statement->fetch();
        if(!$result){
            header("Location:referencias.admin.php");
        };

        ///get images related to the reference
        $query = $conexion->prepare("SELECT * FROM images WHERE referencias_id = :fotoId ");
        $query->execute(array(
            ':fotoId'=> $id
        ));
        $output = $query->fetchAll();

        //echo $output[0]['thumb'];
        
        if(!$output){
            echo "no imagenes disponibles";
        };

    }else{
         header("Location:referencias.admin.php");
         echo "validation error";
    }
}
// }else{
//     header("Location:referencias.admin.php");
// }

/////////////////////////////////////////////////
//////////////updateReference//////////////////////
//////////////////////////////////////////////////
if($_SERVER['REQUEST_METHOD']=='POST' &&  isset($_POST['nuevaReferencia'])){
    
     echo $_POST['refId'];
     echo $_POST['title'];
     echo $_POST['textContent'];
    $newId=$_POST['refId'];
    $newTitle=$_POST['title'];
    $newContent=$_POST['textContent'];
    $statement=$conexion->prepare('UPDATE referencias SET title =:title, content =:content  WHERE id=:id');
    $statement->execute(array(
        ':title'=> $newTitle,
        ':content'=> $newContent,
        ':id' => $newId

    ));
    //echo "worked";
    header("Location: singleReferencia.admin.php?id=".$newId);
};
/////////////////////////////////////////////////////
/////////////SELECT FILE////////////////////////////
////////////////////////////////////////////////////

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_FILES) && isset($_POST['submit'])){
    $check = @getimagesize($_FILES['referencia_picture']['tmp_name']);
    $id=$_POST['referenciaId'];
    $id=(int)$id;
    
    if($check !==false){
        
        $folder= 'img/reference_img/';
        $uploadedFile = $folder . $_FILES['referencia_picture']['name'];
        // unlink("img/profile_img/".$file);
        move_uploaded_file($_FILES['referencia_picture']['tmp_name'], $uploadedFile);
        
        //insert image  in DB
        $statement = $conexion->prepare('INSERT INTO images (thumb,referencias_id) VALUES (:thumb, :refId)');
        $statement->execute(array(
            ':thumb'=>$_FILES['referencia_picture']['name'],
            ':refId'=> $id
        ));
        header("Location:singleReferencia.admin.php?id=".$id);
        

    }else{
        header("Location:singleReferencia.admin.php?id=".$id);
    }

}

////////////////////////////////////////////////////////////////
/////delete referencia and related images///////////////////////
////////////////////////////////////////////////////////////
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['borrarReferencia']) && isset($_POST['refId'])){
    echo "succes";
    $idReference = $_POST['refId'];
    $idReference = filter_var($idReference, FILTER_SANITIZE_NUMBER_INT);
    $idReference =(int)$idReference;

    ////get all thumbs from images related to the reference and store in array;
    $statement2 = $conexion->prepare("SELECT thumb FROM images WHERE referencias_id =:id"); 
    $statement2 ->execute(array(
        ':id'=> $idReference
    ));
    $allThumbs = $statement2->fetchAll();
    ///delete all images from image folder / UNLINK
    foreach($allThumbs as $item){
        unlink("img/reference_img/".$item['thumb']);
    };


    ////delete reference from db
    $statement = $conexion->prepare("DELETE FROM referencias WHERE id =:id");
    $statement->execute(array(
        ':id'=> $idReference
    ));

    // ////get all thumbs from images related to the reference and store in array;
    // $statement2 = $conexion->prepare("SELECT thumb FROM images WHERE referencias_id =:id"); 
    // $statement2 ->execute(array(
    //     ':id'=> $idReference
    // ));
    // $allThumbs = $statement2->fetchAll();
    // ///delete all related pictures
    // $statement3 = $conexion->prepare("DELETE * FROM images WHERE referencias_id =:id"); 
    // $statement3 ->execute(array(
    //     ':id'=> $idReference
    // ));

    // ///delete all images from image folder / UNLINK
    // foreach($allThumbs as $item){
    //     unlink("img/reference_img/".$item['thumb']);
    // };
    

    header("Location:referencias.admin.php");
}







 include "views/singleReferencia.view.php";


function validarDatos ($refId) {
    if($refId == ''){
        
        return false;
        
    }else{
        return true;
    }
   
}



?>




