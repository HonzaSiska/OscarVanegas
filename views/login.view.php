
        <div class="sub_header">
            <h1 id="login_header">LOGIN</h1>
            
        </div>
       
        <hr class="border">
        <div class="form_wraper">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <input type="text" name="usuario" class="inputFieldLogin" placeholder="usuario">

            </div>
            
            <div class="form-group">
                <input type="password" name="password" class="inputFieldLogin" placeholder="contrasena">
                <button class="btn" id="login_btn" onclick="login.submit()">Login<button>

            </div>
            
            <?php if(!empty($errores)): ?>   
                <div class="error">
                    <ul>
                        <?php echo $errores;?>
                    </ul>
                </div>

            <?php endif;?> 

        </form>
       

            


    </div>
    <script src="js/ajax.js"></script>
    <script>
        hideUserName();
     </script>
    
</body>
</html>