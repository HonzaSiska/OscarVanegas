    <section id="gallery_background">
    <h1 class="title"> <?php echo strtoupper($pageTitle); ?></h1>
        <div class="paginacion">
            <div class="gallery_buttons">
                <div id="left_section_buttons" class="gallery_buttons_section">
                    <!-- this button takes you to the previous gallery page , it is only shown if it is not the first page-->
                    <?php if($pagina_actual > 1): ?>
                        <a class="main_btn anterior" href="galeria.php?p=<?php echo $pagina_actual - 1; ?>">Anterior</a>
                    <?php endif?>
                </div>


                <div id="middle_section_buttons" class="gallery_buttons_section">
                    <ul>
                        <!-- this is the GO TO FIRST PAGE button , it is disabled on the first page -->
                        <?php if($pagina_actual == 1): ?>
                            <li class="disabled">&laquo;</li>
                        <?php else: ?>
                            <li><a href="?p=1">&laquo;</a></li>
                        <?php endif; ?>
                        <!-- shows buttons with number of all gallery pages, butten of current page is disabled -->
                        <?php for($x= 1; $x <= $total_paginas; $x++){
                            if($pagina_actual == $x){
                                echo "<li class='active' ><a class='selected'   href='?p=$x'>$x</a></li>";
                            }else{
                                echo "<li><a href='?p=$x'>$x</a></li>";
                            }
                        }
                        ?>
                        <!-- this is the GO TO LAST PAGE button , it is disabled on the last page -->
                        <?php if($pagina_actual == $total_paginas):?>
                            
                            <li class="disabled">&raquo;</li>

                        <?php else: ?>
                            <li class="active"><a href="?p=<?php echo $total_paginas ?>">&raquo;</a></li>

                        <?php endif; ?>            
                    </ul>
                </div>

                <!-- this button takes you to the next gallery page , it is only shown if it is not the last page-->
                <div id="right_section_buttons" class="gallery_buttons_section">
                    <?php if($total_paginas !=  $pagina_actual): ?>
                        <a class="main_btn seguiente" href="galeria.php?p=<?php echo  $pagina_actual +1; ?>">Seguiente</a>
                    <?php endif?>
                </div>
            </div>
        </div>
        <div class="gallery_wrapper" id="gallery_wrapper">
            
                <?php foreach ($fotos as $foto) :?>
                    <div class="image_grid">
                        <div class="image_wrapper_gallery">
                           <a href="foto.php?id=<?php echo $foto['id'];?>&p=<?php echo $pagina_actual; ?>" class="image_link_gallery" >
                               <img src="img/reference_img/<?php echo $foto['thumb'];?>">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>


        </div>
        
        
    </section>





