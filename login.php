<?php  


session_start();

include('config.php');
$pageTitle="Login";
include('views/header.admin.php');
// echo "<script>document.getElementById('#header_content_right').style.display = 'hidden';</script>";

//include('classes/user.php');

if(isset($_SESSION['usuario'])){
    header('Location:admin.php');
}

$errores='';

if($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = hash('sha512',$password);

    //try {
    //    $conexion = new PDO('mysql:host=localhost;dbname=oscar_vanegas','root','');
    //   echo'conected';

    //} catch (PDOExeptions $e) {
    //    echo "ERROR: ". $e->getMessage();
 
    //}

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
    $statement->execute(array(
        ':usuario'=>$usuario,
        ':password'=>$password
    ));
    $resultado = $statement->fetch();
    //$user = new User ($usuario, $password, $conexion);
    //$statement = $user->userExistsSql();
    //$statement->execute();
    //$resultado = $statement->fetch();


    if($resultado != false){
        $_SESSION['usuario'] = $usuario;
        header('Location:admin.php');
    }else{
        $errores.='<li>Datos incorrectos</li>';
        
    }
}







require('views/login.view.php');
?>