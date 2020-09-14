// declaration of variables

var tabla = document.getElementById('tabla'),
loader= document.getElementById('loader')
error_box = document.getElementById('error_box');
var errorMessage="";
var usuario;
var password;
var password2;
var access;
var currentSession = document.getElementById('session');
var cerrar_session_btn = document.getElementById('cerrar_session_btn');
var cambiar_contrasena = document.querySelector('#cambiar_contrasena_btn');
var cambiar_usuario = document.getElementById('cambiar_user_btn');
var passwordGroup = document.querySelector('#newPasswordGroup');
var update_contrasena = document.querySelector('#update_contrasena_btn');
var update_user = document.querySelector('#update_user_btn');
var old_password = document.querySelector('#old_password');
var re_type_admin_input = document.querySelector('#re_type_admin_input');
var admin_input = document.querySelector('#admin_input');
var changeAdminForm = document.querySelector('#changeAdminForm');
var changePasswordForm = document.querySelector('#changePasswordForm');
var id;
var newUser = document.querySelector('#re_type_admin_input');
var newUser2 = document.querySelector('#re_type_admin_input2');


/////////////////////////////////////////////////
/// This function loads all users  via AJAX//////
/////////////////////////////////////////////////

function cargarUsuarios(){

    var elemento = '<thead><tr><th></th><th>Id</th><th>Usuario</th><th>Acceso</th><th></th><th></th></tr></thead><tbody>';
    
    var peticion = new XMLHttpRequest();

    peticion.open('GET','ajax/usuarios.ajax.php');

    loader.classList.add('active');

    peticion.onload = () => {
        var datos = peticion.responseText;
        datos = JSON.parse(datos);
        console.log(datos[2]);

        if(datos.error){
            error_box.classList.add('active');
            console.log('error');
        }else{
            var x=1;
            for(var i = 0; i < datos.length; i++){
                elemento += "<tr value='" +x+"'><td class='first_cell'><button  class='profileLink' ><i class='fa fa-user' aria-hidden='true'></i></button><img onerror='this.style.display=\"none\"' class='user_list_img' id='user_list_img"+i+"' src='img/profile_img/"+datos[i].thumb +"'></td>";
                elemento += "<td>" + datos[i].id + "</td>";
                elemento += "<td>" + datos[i].usuario + "</td>";
                elemento += "<td>" + datos[i].privilege + "</td>";
                elemento += '<td><button onclick="showPopup(this.value)" value="'+x+'" class="btn user_delete_btn" id="user_delete_btn'+x+'">Borrar</button><div id="pop'+x+'" class="pop"><div class="triangle-up"></div><div class="triangle-up2"></div><h3>Borrar?</h3><button value="'+x+'"onclick="hidePopup(this.value)" class="comfirmPositive">Sí</button><button onclick="hidePopup(this.value)" value="'+x+'" id="confirmNegative'+x+'"class="comfirmNegative">No</button></div></td>';
                elemento += '<td><button class="btn" id="change_pass">Cambiar Acceso</button></td>';
                elemento+="</tr>";
                x++;
            }
            elemento+='</tbody></table>'
            tabla.innerHTML=elemento;
        }

    }
    peticion.onreadystatechange = () => {
        if(peticion.readyState == 4 && peticion.status == 200){
            loader.classList.remove('active');
        }
    }
    peticion.send();
    

}


/////////////////////////////////////////////////////////////////////
/// get  user from list of users and insert it into DB via AJAX//////
/////////////////////////////////////////////////////////////////////

function singleUsuario(e) {
    e.preventDefault();

    error_box.innerHTML="";

    usuario = document.getElementById('usuario').value;
    password = document.getElementById('password').value;
    password2 = document.getElementById('password2').value;
    access= document.getElementById('access').value;
   

    if(validarAgregarUsuariosInput(usuario, password, password2, access)){
        var xhr = new XMLHttpRequest();

        xhr.open('GET','ajax/single_usuario.ajax.php');
        
        // var parametros = 'usuario='+ usuario;
        
        loader.classList.add('active)');

        xhr.onload = () => {
            
            var datos = xhr.responseText;
            
            datos = JSON.parse(datos);
            console.log(datos); 
            

            if(datos.error){
                error_box.innerHTML="Couldnt get the data from DB";
                console.log('error');
            }
           
            //CHECK IF USER IS ADMIN TO BE ABLE TO ADD USUARIOS
             
            $.ajax({
                type: "GET",
                url: 'ajax/get_privilege.ajax.php',
                data: {usuario: currentSession},
                success: function(data){

                    loggedUser=data.privilege;
                    //if logged person is admin , now  can delete the user he  clicked on

                    if(loggedUser=='admin'){
                        insertNewUser();
                    //if is not admin , error message is set and delete of user doesnt happen    
                    }else{
                        error_box.innerHTML="Accesso restringido";
                    }
                    
                }
            });
            
        }

        xhr.onreadystatechange = () => {
            if(xhr.readyState == 4 && xhr.status == 200){
                loader.classList.remove('active');
            }
        }
        xhr.send();

    };
            
    
}

    

///////////////////////////////////////////////////////////////////
//// validate user input /////////////////////////////////////////
////////////////////////////////////////////////////////////////////

function validarAgregarUsuariosInput(usuario, password,password2){
    if(usuario ="" || password=="" || password2==""){
        error_box.innerHTML="Rellena todos campos";

    }else if(password != password2){
        error_box.innerHTML="Las contrasenas no son iguales";

    }else{
        return true;
    }
}


///////////////////////////////////////////////////////////////////////////////
////////////CHECK IF LOGGED USER IS ADMIN//////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function checkUserIsAdmin(datos){
    var loggedUser = document.getElementById('session').value;
                for (i=0; i<datos.length;i++){
                    if(datos[i].privilege=='admin' && datos[i].usuario == loggedUser){
                        //var admin = datos[i].usuario;
                        return true;
                        break;
                    }else{
                        //var admin="";
                        return false;
                    }
                }
               // return admin;
}


///////////////////////////////////////////////////////////////////////////////////////
///////////INSERT NEW USER?//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

function insertNewUser(){
    var xhr2 = new XMLHttpRequest();
                xhr2.open('POST','ajax/insertar_usuario.ajax.php');
                
                usuario = document.getElementById('usuario').value;
                password = document.getElementById('password').value;
                access = document.getElementById('access').value;
                var parametros2 ='usuario=' + usuario + '&pass=' + password + '&privilege='+ access;
                //alert(parametros2);
                xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr2.onload = function(){

                
                tabla.innerHTML="";
                cargarUsuarios();
                usuario = document.getElementById('usuario').value='';
                password = document.getElementById('password').value='';
                password2 = document.getElementById('password').value='';
                access = document.getElementById('access').value='';
                }
                
                xhr2.send(parametros2);
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////// EVENTS LISTENERS /////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//-------add user-------------------//////////////////////////////////////////////////

document.getElementById('agregar_usuario').addEventListener("click", singleUsuario);

//-------display profile btns and input fields  input fields//////////////////////////////////////////////////

function openAdminForm() {
    changePasswordForm.classList.add('hidden');
    changeAdminForm.classList.remove('hidden');
}
function openPasswordForm() {
    changePasswordForm.classList.remove('hidden');
    changeAdminForm.classList.add('hidden');
}



////////////////////////////////////////////////////////////////////////////////
///////// FUNCTION SHOW AND HIDE POPUP//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

function showPopup(clicked){
    //var button = "#user_delete_btn"+clicked;
    var borrar ="#pop"+clicked;
    //alert(borrar);
    $(".pop").hide();
    $(borrar).show().animate({height: "150px"}, 0);
        
  
}
function hidePopup(clicked){
    //var button = "#user_delete_btn"+clicked;
    var borrar ="#pop"+clicked;
    //alert(borrar);
    $(borrar).hide();
        
  
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////IF SESSION IS NOT SET, HIDE BUTTON CERRAR SESSION //////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

var currentSession = document.querySelector('#session').value;
var cerrar_session_btn = document.getElementById('cerrar_session_btn');

function hideUserName(){
    if(currentSession == ""){
        cerrar_session_btn.style.display = "none";
        
    }else{
        cerrar_session_btn.style.display = "block";
        
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////check if clicked user is logged in/////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){

    // code to read selected table row cell data (values).////////////////////////////////////////////////
    $("#tabla").on('click','.profileLink',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var id=currentRow.find("td:eq(1)").text();// get current row 1st TD value
         var user=currentRow.find("td:eq(2)").text();// get current row 1st TD value
         id = parseInt(id);
         url = 'profile.php?id=' + id ;
         //var id2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         //var id3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
        
         if (user == currentSession){
             //alert('true');
             window.location.href = url;
         }else{
            str = user.toUpperCase();
            error_box.innerHTML="No puedes entrar perfil de usuario <strong>"+ str +"</strong>";
            
         }
         
         
    });
});






////////////////////////////////////////////////////////////
////////////////////// DELETE USER IF YOU ARE ADMIN/////////
/////////////////////////////////////////////////////////////
$(document).ready(function(){


error_box.innerHtml="";
$("#tabla").on('click','.comfirmPositive',function(){
    // get the current row
    var currentRow=$(this).closest("tr"); 
    
    var id=currentRow.find("td:eq(1)").text();// get current row 1st TD value
    
    id = parseInt(id);
    
    

    //check if user who clicked is ADMIN

    $.ajax({
        type: "GET",
        url: 'ajax/get_privilege.ajax.php',
        data: {usuario: currentSession},
        success: function(data){

            loggedUser=data.privilege;
            //if logged person is admin , now  can delete the user he  clicked on

            if(loggedUser=='admin'){
                $.ajax({
                    type: "POST",
                    url: 'ajax/delete_usuario.ajax.php',
                    data: {id: id},
                    success: function(data){
                        cargarUsuarios();
                    }
                });
                //alert('DELETED');
                //cargarUsuarios();
            //if is not admin , error message is set and delete of user doesnt happen    
            }else{
                error_box.innerHTML="Solo administrador puede borrar usuarios";
            }
            
        }
    });
    
    
    
    

    });
});
//////////////////////////////////////////////////////////////////////////////////////////////////
////////////////change Access/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){


    error_box.innerHtml="";
    $("#tabla").on('click','#change_pass',function(){
        // get the current row
        var currentRow=$(this).closest("tr"); 
        
        var id=currentRow.find("td:eq(1)").text();// get current row 1st TD value
        var acceso=currentRow.find("td:eq(3)").text();// get current row TD  acceso
        
        id = parseInt(id);
        //alert(id);
        //alert(acceso);
        
        
        
    
        //check if user who clicked is ADMIN
    
        $.ajax({
            type: "GET",
            url: 'ajax/get_privilege.ajax.php',
            data: {usuario: currentSession},
            success: function(data){
    
                loggedUser=data.privilege;
                //alert("LOGGED USER IS "+ loggedUser)
                //if logged person is admin , now  can delete the user he  clicked on
    
                if(loggedUser=='admin'){
                    // alert("YOU ARE "+ loggedUser);
                    $.ajax({
                        type: "POST",
                        url: 'ajax/cambiar_acceso.ajax.php',
                        data: {
                               id: id,
                               acceso: acceso
                            },
                        success: function(data){
                            //cargarUsuarios();
                            
                        }
                    });
                    //alert('updated');
                    
                    cargarUsuarios();
                //if is not admin , error message is set and delete of user doesnt happen    
                }else{
                    error_box.innerHTML="Solo administrador puede cambiar acceso usuarios";
                }
                
            }
        });
        
     
    
        });
    });

 ///////////////////////////////////////////
 ////UPDATE PASSWORDS////////////////////
 /////////////////////////////////////////

function updatePassword(){
    var userId = document.querySelector('#userId').value;
    var old_password = document.querySelector('#old_password').value;
    // alert("test " + userId);
    if(validatePasswordChangeForm()){
        
        
            $.ajax({
                type: "GET",
                url: 'ajax/chequear_contrasena.ajax.php',
                data: {id: userId,
                      password:old_password
                      },
                success: function(data){
                    
                    
                    if(data==true){
                        //if password matches save the new password in the db
                        
                        var password2 = document.querySelector('#password2').value;
                        var password3 = document.querySelector('#password3').value;
                        //alert('password2:'+password2 + 'password3:'+password3 )
                        if(password2 != password3){
                            
                            error_box.innerHTML="contrasenas nuevas nos son iquales";
                        }else{

                            $.ajax({
                                type: "POST",
                                url: "ajax/insertar_nueva_contrasena.ajax.php",
                                data: {
                                    id: userId,
                                    password: password2
                                },
                                success: function(data){
                                    
                                }
                            }
                           
                        )}

                        
                    }else{
                        error_box.innerHTML="contrasena incorecta";
                    }
                },
                
            });
            
        
        
    };
    
}  
//////////////////////////////////////////////////////////////////////////
////////CHANGE USERNAME//////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
function changeUsername(){
    var userId = document.querySelector('#userId').value;
    newUser = newUser.value;
    if(validateUsernameChangeForm()){
        $.ajax({
            type: "POST",
            url: "ajax/actualizar_usuario.ajax.php",
            data: {
                id: userId,
                user: newUser
            
            },
            success: function(data){
                location.reload(); 
            }
        });
    };
};
  
///////////////////////////////////
function validatePasswordChangeForm(){

    
    var old_password = document.querySelector('#old_password').value;
    var password2 = document.querySelector('#password2').value;
    var password3 = document.querySelector('#password3').value;
        
        if(old_password=="" || password2=="" || password3==""){
            error_box.innerHTML="Rellena todos campos";
         
        }
        else{
            error_box.innerHTML = '';
            return true;
        }
        
}
///////////////////////////////////////////////
function validateUsernameChangeForm(){
    
    if(newUser.value=='' || newUser2.value==''){
        error_box.innerHTML="Rellena todos campos";
    }else if(newUser.value == newUser2.value){
        error_box.innerHTML="Nuevos usuarios nos son iguales";
    }else{
        error_box.innerHTML ="";
        return true;
    }
}

///////////////////////////////////////////
//hide and show button that delets refeence image on single reference page

function showBorrarButton(clicked){

    
    var clickedEl = document.getElementById("trashIcon"+clicked);

    $("#delete_ref_image"+clicked).show();
    $("#closeIcon"+clicked).show();
    $(clickedEl).hide();
}

function hideBorrarButton(clicked){

    var clickedEl = document.getElementById("closeIcon"+clicked);

    $("#delete_ref_image"+clicked).hide();
    $("#closeIcon"+clicked).hide();
    
    $("#trashIcon"+clicked).show();
    $(clickedEl).hide();

};
///////////////////////////////////////////////////////////////////////
/////this function displays buttons to comfirm delete of reference or cancel
/////////////////////////////////////////////////////////////////////////

function showReferenceComfirmButtons(){
        $('#deleteReferenceComfirm').show();
    }

/////////////////////////////////////////
///delete reference - cancel button funtions
//////////////////////////////////////////
function cancelDeleteReference(){
    $('#deleteReferenceComfirm').hide('500','swing');
}

//////////////////////////////////////////////////////
///

// $(document).ready(function(){
//     alert("test1");
//     $( "#menu_toggle" ).click(function() {
//         alert("test");
//         $( "#header_right" ).toggle( "slow", function() {
//         // Animation complete.
//         });
//     });
// });