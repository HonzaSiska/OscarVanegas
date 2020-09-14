
        <div class="sub_header">
            <h1>Usuarios</h1>
        </div>
    
    <!-- <p id="test" >test</p> -->

        
        <form action="" id="formulario" class="formulario" autocomplete="off">
            <input type="text" name="usuario" id="usuario" placeholder="usuario" autocomplete="off">
            <input type="password" name="password" id="password" placeholder="password" autocomplete="off">
            <input type="password" name="password2" id="password2" placeholder="re-type password" autocomplete="off">
            <select type="text" name="access" id="access" placeholder="acceso" autocomplete="off"> 
                <option value="admin" >admin</option>
                <option value="user" selected="selected">user</option>
            </select>
            <button type="submit" class="btn" id="agregar_usuario">Agregar Ususario</button>
            


        </form>
        
        <div id="error_box">
            <p></p>
        </div>
        <table id="tabla" class="tabla">
        
        </table>
        <div class="loader" id="loader"></div>


    </div>
    <script src="js/ajax.js"></script>
    <script>cargarUsuarios()</script>
    


        
</body>
</html>