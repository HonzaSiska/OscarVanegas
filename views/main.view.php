<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Muli:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&family=Suranna&display=swap" rel="stylesheet"> 
    <script src="https://use.fontawesome.com/af59670c9f.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tablet.css">
    <title>Oscar Vanegas</title>
</head>
<body>
    <div class="container">
        <div class="main_page_container">

            <div class="intro_section" id="intro_section_left">
                    <img src="img/images/geologo2.svg" id="geologo_img">
                    <h1 id="logo_title"> OSCAR VANEGAS - GEOLOGO</h1>
                    <p>
                        <?php
                            echo getContent(0,$conexion);
                        ?>
                    </p>
                
            </div>
            

            <div class="intro_section" id="intro_section_center">
                
                
                
                <div class="intro_grid">
                    <div class="intro_grid_item"></div>
                    <div class="intro_grid_item"></div>
                    <div class="intro_grid_item"></div>
                    <div class="intro_grid_item"></div>
                </div>
                <div class="intro_btn">
                    <a style="text-decoration:none;" href="inicio.php" id="enter_btn" >ENTRAR</a>
                </div>
               
            </div>
            
            <div class="intro_section" id="intro_section_right">
              
            </div>
          
            
        </div>
    </div>
    <div class="video_container">
            <video  id="video_intro" class="video_intro" controls="false" autoplay="autoplay" loop="loop" playsinline="playsinline" preload="metadata" data-aos="fade-up">
                <source type="video/mp4" src="img/images/lava_field.mp4"/>
                
            </video>
    </div>
    <script>
        document.getElementById('video_intro').controls = false;
        // document.getElementById('video_intro').play();
        var autoPlayVideo = document.getElementById('video_intro');
        autoPlayVideo.oncanplaythrough = function() {
        autoPlayVideo.muted = true;
        autoPlayVideo.play();
        autoPlayVideo.pause();
        autoPlayVideo.play();
    }
    </script>
</body>
</html>
    
