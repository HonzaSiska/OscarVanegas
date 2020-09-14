

<form name ="updateReferencia" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  class="displayTextContentForm" id="updateReferencia">
    <h1 value="1">REFERENCIA : <?php echo $result['id'];?></h1>
    <input type="hidden" name="refId" value=" <?php echo $result['id'];?>">
    <input type="text" name="title" id="updateReferenciaTitle" placeholder="Title" class="adminInput" value="<?php echo $result['title'];?>">

    <textarea name="textContent" value="<?php echo $result['content'];?>"> <?php echo $result['content'];?></textarea>
    <input type="submit" class="btn" value="Actualizar Referencia" name="nuevaReferencia">
    <input id="openComfirmButtons" type="button" class="btn user_delete_btn" value="Borrar Referencia" onclick="showReferenceComfirmButtons()" >
    <div id="deleteReferenceComfirm">
        <input type="submit" class="btn" value="Si" name="borrarReferencia" id="siBorrarReferencia" >
        <input type="button" class="btn" value="No" id="noBorrarReferencia" onclick="cancelDeleteReference()">
    </div>    



</form>


<!-- picture upload-->
<form class="upload_profile_picture" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
    <label for="profile_picture"></label>
    <input id="referenciaId" name="referenciaId" type="hidden" value=" <?php echo $result['id'];?>" >
    <input type="file" name="referencia_picture" id="referencia_picture" class="picture">
    <input id="referenciaImageSubmit" class="submit btn green" type="submit" value="Subir Foto" name="submit">
    <!-- <input type="text"value="<?php echo $result['id'];?>"></h2> -->
</form>
<div class="img_container">
    <?php foreach ($output as $image): ?>
        <?php $counter++; ?>
        <div class="image_wrapper" >
        
            <i id="trashIcon<?php echo $counter;?>" class="fa fa-trash" aria-hidden="true" onclick="showBorrarButton(<?php echo $counter; ?>)"></i>
            <!-- <?php echo  "img/reference_img/".$image['thumb'];?> -->
            <div class="image_title_wrapper">
                <img src="img/reference_img/<?php echo $image['thumb'];?>" alt='test'>
                <p><?php echo $image['thumb'] ; ?></p>

            </div>
            
            <i id="closeIcon<?php echo $counter; ?>" class="fa fa-window-close" aria-hidden="true"  onclick="hideBorrarButton(<?php echo $counter; ?>)" ></i>
            
            <div class="delete_foto_btn_wrapper" id="delete_foto_btn_wrapper<?php echo  $counter?>" >
            
                <a id="delete_ref_image<?php echo $counter; ?>" class="btn user_delete_btn delete_ref_image" href="deleteImageReferencia.admin.php?id=<?php echo $result['id'];?>&imageId=<?php echo $image['id'];?>&deleteimg=<?php echo $image['thumb'];?>"> Borrar Imagen</a>
               
            </div>
            
            
        </div>
        

    <?php endforeach;  ?>
    <script src="js/ajax.js"></script>
</div>
