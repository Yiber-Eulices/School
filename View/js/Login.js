$(".btnLogin").click(function(){
        var rol = $("#TxtRol").val();
        var user = $("#TxtUser").val();
        var password = $("#TxtPassword").val();
        objeto = new FormData();
        objeto.append("Rol",rol);
        objeto.append("User",user);
        objeto.append("Paswword",password);
        $.ajax({
            url:"../Ajax/AjaxLogin.php?a=login",
            method:"POST",
            data:objeto,
            cache:false,
            contentType:false,
            processData:false,
            dataType: "json",
            success : function(respuesta){
                if(respuesta==true){
                    window.location = "Home.php"; 
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