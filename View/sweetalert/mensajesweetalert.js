function ValidateCreateUpdate(m) {
    Swal.fire({
            title: 'Campos Incompletos.',
            text: m,
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
            //cancelButtonText: 'Cancelar'
    });    
}
function ValidateError(m) {
    Swal.fire({
            title: 'Error !.',
            text: m,
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
            //cancelButtonText: 'Cancelar'
    });    
}
function ValidateCreateExito(a) {
    Swal.fire({
            title: 'Campos Almacenados.',
            text: a,
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
            //cancelButtonText: 'Cancelar'
    }); 
}
function ValidateCreateEliminar(c) {
    Swal.fire({
            title: 'Campos Eliminados.',
            text: c,
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
            //cancelButtonText: 'Cancelar'
    }); 
}

