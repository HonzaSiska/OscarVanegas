

<div class="content">
<h2 class="title"> <?php echo strtoupper($pageTitle); ?></h2>

    <div id="contact_wrapper">
        <div id="contact_sub_wrapper">
            <div id="contact_left_section">
                <h2>MENSAJE</h2>
                <?php if(!empty($errores)) :  ?>
                        <div class="error">
                            <?php echo $errores; ?>
                        </div>
                    <?php elseif($enviado): ?>
                        <div class="success">
                            <?php echo "ENVIADO !!"; ?>
                        </div>
                    <?php endif; ?>
                <form id="contact_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method="post">
                    <input type="text" name="first_name" class="contact_input" placeholder="Nombre" value="<?php echo $nombre ;?>">
                    <input type="text" name="last_name" class="contact_input" placeholder="Apellido" value="<?php echo $apellido; ?>">
                    <input type="email" name="email" class="contact_input" id="" placeholder="Correo Electronico" value="<?php echo $correo ;?>">
                    <textarea name="message" id="contact_message"  class="contact_input" placeholder="Tu mensaje" ><?php echo $mensaje ;?></textarea>
                    
                    

                    <input class="contact_input btn" id="contacto_enviar_btn" type="submit" name="submit" value="Enviar">
                </form>
            </div>
            <div id="contact_right_section">
                <h2>CONTACTO</h2>
                <ul class="contact_list main_contact">

                    <li><?php  echo $result['fullname']  ;?></li>
                    <li><?php  echo $result['email']  ;?></li>
                    <li><?php  
                        if($result['email_alternate']!=="0" && $result['email_alternate']!==""){      
                            echo $result['email_alternate'] ;
                            }else{ ?>
                                <script>$(this).hide();</script> <?php
                            }
                            ?>
                    </li>
                    <li><?php  echo $result['phone']  ;?></li>
                    <li><?php  
                        if($result['phone_alternate']!=="0" && $result['phone_alternate']!==""){      
                            echo $result['phone_alternate'] ;
                            }else{ ?>
                                <script>$(this).hide();</script> <?php
                            }
                            ?>
                    </li>
                    <li><?php  echo $result['address']  ;?></li>
                    <li><?php  
                        if($result['address_second']!=="0"){      
                            echo $result['address_second'] ;
                            }else{ ?>
                                <script>$(this).hide();</script> <?php
                            }
                            ?>
                    </li>
                    <li><?php  echo $result['city']  ;?></li>
                    <li><?php  echo $result['country']  ;?></li>

            </div>
        </div>

    </div>





</div>