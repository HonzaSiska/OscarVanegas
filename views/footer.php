   
    <footer>
        <div class="footer_contact_info">
            <div class="footer_left">
                <ul class="contact_list">

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
                    
                </ul>
            </div>


            <div class="footer_right">
                <ul class="contact_list">

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

                </ul>
            </div>

        </div>
        <a href="https://www.facebook.com/jan.siska.94"  target="_blank" id="copyright">Copyrights &copy; 2020 Jan Siska</a>
        
    </footer>
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

    <script>
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('#back2Top').fadeIn();
        } else {
            $('#back2Top').fadeOut();
        }
    });
    $(document).ready(function() {
        $("#back2Top").click(function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

    });

// hide and show nav bar
   $(document).ready(function(){
        $(".fa.fa-bars").click(function(){
            $("#header_right").show('slow');
            $(".fa.fa-window-close-o").show('slow');
            $(".fa.fa-bars").hide('slow');
        })
        $(".fa.fa-window-close-o").click(function(){
            $("#header_right").hide('slow');
            $(".fa.fa-window-close-o").hide('slow');
            $(".fa.fa-bars").show('slow');
        })
   
   })
    
    </script>
    <script src="js/main.js"></script>
</body>

</html>