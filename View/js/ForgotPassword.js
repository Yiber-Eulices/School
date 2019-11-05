$(".btnRecuperar").click(function(){
    var rol = $("#TxtRol").val();
    var user = $("#TxtUser").val();
    objeto = new FormData();
    objeto.append("Rol",rol);
    objeto.append("User",user);
    $.ajax({
        url:"../Ajax/AjaxLogin.php?a=recuperar",
        method:"POST",
        data:objeto,
        cache:false,
        contentType:false,
        processData:false,
        dataType: "json",
        success : function(respuesta){
            if(respuesta==true){
                var m = "Por favor revise su correo Electronico";
                ValidateCreateUpdate(m);
                window.location = "Login.php"; 
            }else{
                var m = respuesta;
                ValidateCreateUpdate(m);
            }                
        }
    });
});
function FormSubmit(){
    return false;
}
$("#TxtRol").select2();