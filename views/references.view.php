<div class="content">
<div class="reference_img_popup">
        <img class="close_btn" src="img/icons/times-circle-regular.svg" alt="">
        <img class="popupImg" src="" alt="">
    </div>
    <div class="reference_title_background">
        <h2 class="title"> <?php echo strtoupper($pageTitle); ?></h2>
    </div>
    
    <?php  foreach($referencias as $ref) : ?>
        
        <div class="referenceWrapper">
        
            
            <?php echo "<div class='reference_content_wrapper'><h2 class='reference_title'>" .$ref['title']. "</h2><p class='reference_description'>" . $ref['content']."</p></div>"; ?>

            <!--this function takes reference id as parameter and ghets all related pictures-->
            <?php echo getImages((int)$ref['id']) ?>
            
            
            
        </div>
    <?php  endforeach; ?>
    </div>
    <!-- <img id="layers" src="img/images/layers_transp2.png" alt="" > -->
    
    <script src="js/ajax.js"></script>
    
   