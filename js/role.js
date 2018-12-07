function save() {
    var valor = "correcto";
    var role_name = $('#role_name').val();
    var role_description = $('#role_description').val();

    if(role_name == ""){
        alertify.error('El campo Nombre está vacío');
        $('#role_name').css('border','solid red');
        valor = "incorrecto";
    } else {
        $('#role_name').css('border','');
    }

    if(role_description == ""){
        alertify.error('El campo Descripcion está vacío');
        $('#role_description').css('border','solid red');
        valor = "incorrecto";
    } else {
        $('#role_description').css('border','');
    }


    if (valor == "correcto"){
        var cadena = "role_name=" + role_name +
            "&role_description=" + role_description;
        $.ajax({
            type:"POST",
            url: urlweb + "api/Role/save",
            data: cadena,
            success:function (r) {
                if(r==1){
                    alertify.success("¡Guardado!");
                    location.href = urlweb +  'Role/all';
                } else {
                    alertify.error("Fallo el envio");
                }
            }
        });
    }

}

function preguntarSiNo(id){
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        function(){ deleter(id) }
        , function(){ alertify.error('Operacion Cancelada')});
}

function deleter(id){
    var cadena = "id=" + id;
    $.ajax({
        type:"POST",
        url: urlweb + "api/Role/delete",
        data : cadena,
        success:function (r) {
            if(r==1){
                alertify.success('Registro Eliminado');
                location.reload();
            } else {
                alertify.error('No se pudo realizar');
            }
        }
    });
}