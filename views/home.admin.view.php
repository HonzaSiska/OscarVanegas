



<?php foreach (getTextContent($conexion) as $post):?>

    
    <form name ="textUpdate" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  class="displayTextContentForm" id="displayTextContentForm<?php echo $post['id'] ;?>">
        <h1 >ID : <?php echo $post['id'] ;?></h1>
        <input type="hidden" name="textId" value="<?php echo $post['id'] ; ?>">
        <h2><?php echo $post['page'] ;?></h2>
        <textarea name="textContent"> <?php echo $post['description'] ;?></textarea>
        <input type="submit" class="btn" value="Actualizar" name="textUpdateButton">
        
        
        
    </form>
    </hr>

<?php endforeach; ?>