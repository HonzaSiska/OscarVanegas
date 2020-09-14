

    
    <form name ="addReferencia" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  class="displayTextContentForm" id="addReferencia">
        <h1 >AGREGAR NUEVA REFERENCIA</h1>
        <input type="text" name="title" id="referenciaTitle" placeholder="Title" class="adminInput" value="<?php echo $referenceTitle; ?>">
        
        <textarea name="textContent"><?php echo $text; ?></textarea>
        <input type="submit" class="btn" value="Crear Nueva Referencia" name="nuevaReferencia">
        <p id='error_box'><?php echo $error_box;?><p>
    
    </form>
    <div class="reference_list">
        <table class="reference_list_table">
            <thead><tr><td>Id</td><td>Titulo</td><td>Contenido</td><td></td></tr></thead><tbody>
            <?php foreach ($allReferences as $reference): ?>
            <tr><td><?php echo $reference['id']; ?></td>
                <td><?php echo $reference['title']; ?></td>
                <td><?php echo strip_tags(substr($reference['content'],0,25)); ?></td>
                <td><button class="btn"><a href="singleReferencia.admin.php?id=<?php echo $reference['id']; ?>">Ver / Actualizar</button></td></tr>


            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- substr("abcdef", -1) -->


