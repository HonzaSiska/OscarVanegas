<?php  

session_start();
include('config.php');
include('functions.php');
$pageTitle ="Contacto";
include('views/header.admin.php');


// $error_box="";
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}

// $dataExists="";
$id="";
//get data from database
$result = getContactInfo($conexion);
// echo $result['phone_alternate'];

// $statement = $conexion -> query("SELECT * FROM contacto");
// $statement -> execute();
// $result = $statement->fetch();
// print_r($result);
if($result){
    $nombre= $result['fullname'];
    $correo=$result['email'];
    $correo2=$result['email_alternate'];
    $cell=$result['phone'];
    $cell2=$result['phone_alternate'];
    
    $direccion=$result['address'];
    $direccion2=$result['address_second'];
    $ciudad=$result['city'];
    $pais=$result['country'];
    $dataExists=true; //if there is any data in the table dataexists = true
    $id=$result['id'];
    

}else{
    $nombre= "";
    $correo="";
    $correo2="";
    $cell="";
    $cell2="";
    $direccion="";
    $direccion2="";
    $ciudad="";
    $pais="";
    $dataExists = false;
    

}




if(isset($_POST['submit'])){ 


    // echo $dataExists. "THERE IS A RESULT";
    // echo "insert";
    $nombre=$_POST['fullname'];
    // echo "****".$nombre ."*********************** \n";
    
    $correo=$_POST['email'];
    $correo2=$_POST['email_alternate'];
    $cell=$_POST['phone'];
    $cell2=$_POST['phone_alternate'];
    // echo "cell alternate ". $cell2;
    $direccion=$_POST['address'];
    $direccion2=$_POST['address_second'];
    $ciudad=$_POST['city'];
    $pais=$_POST['country'];
    
    // echo "****".$id ."***********************";

    if($dataExists==true){
        //update contact info
    

        $statement = $conexion->prepare(
            "UPDATE contacto SET 
            id = :id,
            fullname = :fn,
            email = :email,
            email_alternate = :email2,
            phone = :phone,
            phone_alternate = :phone2,
            address = :address,
            address_second = :address2,
            city = :city,
            country = :country
            WHERE id = :id

            ");
        $statement -> execute(array(
            ":fn" => $nombre,
            ":email" => $correo,
            ":email2" => $correo2,
            ":phone" => $cell,
            ":phone2" => $cell2,
            ":address" => $direccion,
            ":address2" => $direccion2,
            ":city" => $ciudad,
            ":country" => $pais,
            ":id" => $id,
        ));

    }else {
        // echo $dataExists . "NO RESULT";
        //update contact info
        // echo "insert";
        

        $statement = $conexion->prepare("INSERT INTO contacto (fullname, email, email_alternate, phone, phone_alternate, address, address_second, city, country)
            VALUES(:fn, :email, :email2,  :phone, :phone2, :address, :address2, :city, :country) ");
            
        $statement -> execute(array(
            ":fn" => $nombre,
            ":email" => $correo,
            ":email2" => $correo2,
            ":phone" => $cell,
            ":phone2" => $cell2,
            ":address" => $direccion,
            ":address2" => $direccion2,
            ":city" => $ciudad,
            ":country" => $pais
            // ":id" => $id,
        ));
        }

  
}



// function checkIsEmptyInputField ($inputField){
//     if(!Empty($_POST[$inputField])){
//         $output = $_POST[$inputField];
//     }else{
//         $output="";
//     }
//     return $output;
// }

include ("views/contacto.admin.view.php");