
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&family=Suranna&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Muli:wght@500&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/af59670c9f.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/adminMobile.css">
    
    <script src="https://cdn.tiny.cloud/1/81hwkn7g7dkw27foqth1afok8x8xts0g0j4yr6zb858ww51p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>
    
    
    <script src="js/ajax.js"></script>
    <title><?php echo $pageTitle;?></title>
    
    
 

</head>
<body>
    <header>
        <div class ="header_block" id="header_content_left">
            <input type="hidden" name="" id="session" value="<?php 
                if(isset($_SESSION['usuario'])){
                    echo $_SESSION['usuario'];
                }else{ 
                    echo "";
                };
                ?>";>

            <span id='session'>
                <?php if(isset($_SESSION['usuario'])){
                    echo $_SESSION['usuario'];
                }else{ 
                    echo "";
                };
                ?>
        
            </span>
            <button class="btn" id="cerrar_session_btn"><a href="session_destroy.php">Cerrar sesion</a></button>
            <h3><a class="headerTitle" href="index.php">INDEX</a></h3>
            <h3><a class="headerTitle" href="admin.php">ADMIN</a></h3>
        </div>
        <div class ="header_block" id="header_content_right">
            <nav id="nav_bar_admin">
                <ul id="nav_bar_admin_wrapper">
                    <?php
                    
                        foreach($navigationAdmin as $item){
                                if($pageTitle=="Login"){
                                    
                                }
                                else if(strtolower($item['title']) == strtolower($pageTitle)){
                                    echo "<li style='border-bottom: 4px solid rgb(240, 73, 23); ' class='nav_bar_admin_item'><a href='".$item['link']."'>". strtoupper($item['title'])."</a></li>";
                                    
                                }else{
                                    echo "<li class='nav_bar_admin_item'><a href='".$item['link']."'>". strtoupper($item['title'])."</a></li>";
                                }
                               
                                // echo $item['title'];
                                // echo strtolower($pageTitle);
                        };
                        
                    ?>
                </ul>
            </nav>

        
    </header>


    <div class="container">