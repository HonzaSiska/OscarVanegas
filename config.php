<?php  
 try {
    $conexion = new PDO('mysql:host=mysql.muj.cloud;dbname=oscar_vanegas_XHGA5','siskajan@h_XHGA5','7611074845');
    // $conexion = new PDO('mysql:host=localhost;dbname=oscar_vanegas','root','');
    // //echo'conected';

} catch (PDOExeptions $e) {
    echo "ERROR: ". $e->getMessage();
    
    //throw $th;
}


$navigationAdmin = array(
    array(
        "title"=>"home",
        "link"=>"home.admin.php"
    ),
    array(
        "title"=>"contacto",
        "link"=>"contacto.admin.php"
    ),
    array(
        "title"=>"referencias",
        "link"=>"referencias.admin.php"
    ),
    // array(
    //     "title"=>"galeria",
    //     "link"=>"galeria.admin.php"
    // ),
);

$mainNavigation = array(
    array(
        "title"=>"inicio",
        "link"=>"inicio.php"
    ),
    array(
        "title"=>"contacto",
        "link"=>"contacto.php"
    ),
    array(
        "title"=>"referencias",
        "link"=>"referencias.php"
    ),
    array(
        "title"=>"galeria",
        "link"=>"galeria.php"
    ),
);


?>