//////////////////////////////////////////////////////////////
//// open reference image in large popup window after click///
//////////////////////////////////////////////////////////////



$(document).ready(function(){
    $(".referencia_img_wraper").click(function(){
        var img_type = $(this).find("img").attr("src") ;
        $('.reference_img_popup').hide();
        $('.popupImg').attr("src", img_type);
        $('.reference_img_popup').show(200);
        
    })
})

//////////////////////////////////////////////////////////////
//// clos image pop up///////////////////////////////////////
//////////////////////////////////////////////////////////////
$(document).ready(function(){
    $('.close_btn').click(function(){
        $('.reference_img_popup').hide();
    })
})





