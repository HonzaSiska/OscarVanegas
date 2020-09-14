
<div class="content">
    <h2 class="title"> <?php echo strtoupper($pageTitle); ?></h2>
    <img id="nica_map" src="img/icons/nica_map.svg" alt="">
    <div id="inicio">

        <section id="inicio_one">
            <div id="image_face"></div>
            <p><?php echo getContent(1,$conexion); ?></p>
            
            

        </section>
        <section id="inicio_icons">
            <div id="inicio_icon_one" class="inicio_icon"></div>
            <div id="inicio_icon_two" class="inicio_icon"></div>
            <div id="inicio_icon_three" class="inicio_icon"></div>
            <div id="inicio_icon_four" class="inicio_icon"></div>

        </section>
        <section id="inicio_two">
            <div id="inicio_left">

                <p><?php echo getContent(2,$conexion); ?></p>
            </div>
            <div id="inicio_right">
                    <img src="img/images/oscar1.jpg" alt="" >
            </div>


        </section>
    </div>
</div>





