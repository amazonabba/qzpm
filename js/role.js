function add() {
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
            url:"http://localhost/qzpm/api/Role/save",
            data: cadena,
            success:function (r) {
                if(r==1){
                    alertify.success("Se envió chevere");
                    location.href ='http://localhost/qzpm/Role/all';
                } else {
                    alertify.error("Fallo el envio");
                }
            }
        });
    }

}