
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&family=Suranna&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Muli:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/af59670c9f.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tablet.css">
    <script src="https://cdn.tiny.cloud/1/81hwkn7g7dkw27foqth1afok8x8xts0g0j4yr6zb858ww51p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- <script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        mediaembed_service_url: "SERVICE_URL",
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table media',
        toolbar_mode: 'floating media ',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        
      });
    </script> -->
    
    
    <script src="js/ajax.js"></script>

    <title><?php echo $pageTitle; ?></title>
    
</head>
<body>
    <header class="page_header">
        <div id="header_left">
            <a href="index.php">
                <img src="img/images/geologo2.svg" id="geologo_img"> 
            </a>
            <h1>OSCAR VANEGAS - GEOLOGO</h1>
        </div>
        <div id="header_right">
            <nav id="main_nav_bar">
            
                <ul>
                <?php
                            
                        foreach($mainNavigation as $item){
                            if(strtolower($pageTitle)=="photo"){
                            } 
                            else if(strtolower($pageTitle)==$item['title']){
                                echo "<li style='background-color: #c89666;'><a style='color: #12343b;' href='".$item['link']."'>". strtoupper($item['title'])."</a></li>";
                                // echo $pageTitle."----". $item['title'];
                            }else{
                                echo "<li  class=''><a href='".$item['link']."'>". strtoupper($item['title'])."</a></li>";
                                
                            }
                           
                        }
                            
                        
                        
                    ?>
                </ul>
            </nav>
        </div>
        <div id="menu_toggle"><i class="fa fa-bars" aria-hidden="true"></i><i class="fa fa-window-close-o" aria-hidden="true"></i></div>
    </header>
    