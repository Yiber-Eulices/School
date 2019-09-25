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



