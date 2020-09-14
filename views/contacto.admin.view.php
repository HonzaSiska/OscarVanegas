<div class="contact_form_wrapper">
    <h1>CONTACTO</h1>
    <form id="admin_contact_form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> ">
        
        <input type="text" name="fullname" id="fullname" placeholder="Nombre completo" value="<?php echo $nombre; ?>" required>
        <input type="email" name="email" id="email" placeholder="Correo electronico" value="<?php echo $correo; ?>" required>
        <input type="email" name="email_alternate" id="email2" placeholder="Correo electronico 2" value="<?php echo $correo2; ?>">
        <input type="text" name="phone" id="phone"  placeholder="Telefono" value="<?php echo $cell; ?>" required> 
        <input type="text" name="phone_alternate" id="phone2"  placeholder="Telefono 2" value="<?php echo $cell2; ?>">
        <input type="text" name="address" id="address" placeholder="Direction - linea 1" value="<?php echo $direccion; ?>" required>
        <input type="text" name="address_second" id="address2" placeholder="Direction - linea 2" value="<?php echo $direccion2; ?>">
        <input type="text" name="city" id="city" placeholder="Ciudad" value="<?php echo $ciudad; ?>" required>
        <input type="text" name="country" id="country" placeholder="País" value="<?php echo $pais; ?>">
        <input type="submit" id="contact_submit" class="btn" name="submit" value="Actualizar" required>

    </form>
</div>