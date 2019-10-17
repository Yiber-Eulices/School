$(document).ready(function (){
    $(".table-materia").DataTable({
        "ajax": "../ajax/AjaxMateria.php?a=lista",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            //"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfo":           "Mostrando registros del _START_ al _END_ ",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

    });
});
$(".btnInsertar").click(function(){
    var nombre = $("#TxtNombre").val();    
    var descripcion = $("#TxtDescripcion").val();
    
    oBJEC_DATA = new FormData();
    oBJEC_DATA.append("Nombre",nombre);
    oBJEC_DATA.append("Descripcion",descripcion);
    
    $.ajax({
        url:"../ajax/AjaxMateria.php?a=crear",
        method:"POST",
        data:oBJEC_DATA,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            if(respuesta){
               // alert("Guardo");
                window.location ="materia.php";
            }else{
                alert("¡¡¡Error!!");
            }
        }

    })

})
$(".table-materia").on("click",".btnDelete",function(){
var id = $(this).attr("IdMateria");
alert(id);
Swal.fire({
    title: 'Estas Seguro de eliminar el usuario?',
    text: "No podras revertir los cambios!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borrarlo!',
    cancelButtonText: 'Cancelar'
}).then((result) => {
    if (result.value) {
        oBJEC_DATA = new FormData();
        oBJEC_DATA.append("id",id);
        $.ajax({
            url:"../ajax/AjaxMateria.php?a=eliminar",
            method:"POST",
            data:oBJEC_DATA,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta){
                    //alert("eliminado");
                    window.location ="materia.php";
                }else{
                    alert("¡¡¡Error!!");
                }
            }

        });
    }
});         
});
$(".table-materia").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdMateria");
    alert(id);
    oBJEC_DATA = new FormData();
    oBJEC_DATA.append("id",id);
    $.ajax({
        url:"../ajax/AjaxMateria.php?a=buscar",
        method:"POST",
        data:oBJEC_DATA,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            
            $("#ModalEdit").modal();
        }
    });



});
$(".ModificarDatos").on("click",".btnModificaDatos",function(){
    var id= $(this).attr("id");
    var nombres=$("#txt_mod_nomb").val(); 
    var apellidos=$("#txt_mod_apel").val(); 
    var direccion=$("#txt_mod_dire").val(); 
    var telefono=$("#txt_mod_tele").val();

    var oBJEC_DATA = new FormData();
    oBJEC_DATA.append("id",id);
    oBJEC_DATA.append("nombre",nombres);
    oBJEC_DATA.append("apellido",apellidos);
    oBJEC_DATA.append("direccio",direccion);
    oBJEC_DATA.append("telefon",telefono);


    $.ajax({
        url:"../ajax/usuarios.ajax.php",
        method:"POST",
        data: oBJEC_DATA,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success : function(respuesta){
            window.location = "tablas.php";      
        }
    });
});
function FunctionCreate(){
    return false;
}