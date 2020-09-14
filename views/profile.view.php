    <div class="sub_header">
                <h1>Perfil de Usuario -  <?php echo $_SESSION['usuario'];?></h1>
    </div>
    
    
        
    
    <div class="form_wraper">
        
        <!-- picture upload-->
            <form class="upload_profile_picture" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                <label for="profile_picture"></label>
                <input id="userId" name="userId" type="hidden" value="<?php echo $result[0] ;?>">
                <input type="file" name="profile_picture" id="profile_picture" class="picture" >
                <input id="pictureSubmit" class="submit btn green" type="submit" value="Subir Foto" name="submit">
                <img src="img/profile_img/<?php echo $result[4];?>" alt="profile" id="profileImage">
                
            </form>

            <form class="formulario" id="changePasswordForm" name="changePasswordForm">
                <h2><?php echo "id: " . $result[0]. " - " .$result[3]; ?></h2>

                <div class="form-group">
                    <input type="text"  name="profileName" class="inputFieldLogin" disabled placeholder="usuario" value="<?php echo $result[1]; ?> ">
                
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="inputFieldLogin" id="old_password" placeholder="contrasena"  >
                    
                    <div id ='newPasswordGroup' class="">
                        <input  type="password2"  name="password2" id="password2" class="inputFieldLogin" placeholder="nueba contrasena"> 
                        <input  type="password3"  name="password3" id="password3" class="inputFieldLogin" placeholder="re-type nueba contrasena"> 
                    </div>  

                    <div id="profile_update_buttons" class="">
                        <button  onclick="updatePassword()" type="button" class="btn green" id="update_contrasena_btn"  name="update_contrasena_btn">Actualizar Contrasena</button>
                        
                    </div>

                    <div> 
                        
                        <button type="button" class="btn" id="cambiar_user_btn" onclick="openAdminForm()">Cambiar Usuario</button> 
                        <!-- add later onclick="changePassword.submit()" -->
                    </div>  
                </div> 
            </form>

            
            <form  class="formulario hidden"  id="changeAdminForm" name="changeAdminForm">
                <h2><?php echo "id: " . $result[0]. " - " .$result[3]; ?></h2>
                
                <div class="form-group">
                    <input type="text"  name="profileName" class="inputFieldLogin" placeholder="usuario" disabled  value="<?php echo $result[1]; ?> ">
                    <input type="text" id="re_type_admin_input" name="profileName" class="inputFieldLogin" placeholder="nuebo usuario" >
                    <input type="text" id="re_type_admin_input2" name="profileName" class="inputFieldLogin" placeholder="re-type nuebo usuario" >

                </div>
                
                <div class="form-group">
                
                    <div id="profile_update_buttons" class="">
                        
                        <button onclick="changeUsername()" type="button" class="btn green" id="update_user_btn" >Actualizar Usuario</button> 
                    </div>
                    <div> 
                        <button type="button" class="btn" id="cambiar_contrasena_btn"  onclick="openPasswordForm()">Cambiar Contrasena</button>
                        
                        <!-- add later onclick="changeAdmin.submit()" -->
                    </div>   
                </div>

                
                

            </form>
            <div id="error_box">
        
        </div>  
            
        </div>
        

          
    </div>
    <script src="js/ajax.js"></script>
    


        
</body>
</html>