<?php   






include('config.php');
include('functions.php');
$pageTitle = "Referencias";
include('views/header.php');




////////////////////////////////
///GET ALL REFERENCES////////////
////////////////////////////////
$statement = $conexion->query("SELECT * FROM referencias");
$statement -> execute();
$referencias = $statement -> fetchAll() ;


////////////////////////////////
///GET ALL IMAGES////////////
////////////////////////////////
function getImages($parentId){
    include('config.php');
    if(!empty($parentId)){
        $id = (int)$parentId;
    
        $statement = $conexion->prepare("SELECT * FROM images WHERE referencias_id = :id");
        $statement->execute(array(
            ':id'=> (int)$parentId
        ));
        $images = $statement -> fetchAll();
        
        $output ="<div class='image_grid_wrapper'><div class='grid_reference_img'>";
        foreach ($images as $image){
            $output .=  "<div   class='referencia_img_wraper'><img class='image' src='img/reference_img/".$image['thumb']."'></div>";
        }
        $output .= "</div></div>";
        return $output;
    }   
}

include ('views/references.view.php');
include ('footer.logic.php');



?>
