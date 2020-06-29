$(document).ready(function(){
    $('#lista').hide();

    $('#form-buscar').submit(function (e) {
        e.preventDefault();
    })

    $('#inputSearch').keyup(function () { // escuchar evento sobre el input
        if ($('#inputSearch').val())
        {
            let inputSearch = $('#inputSearch').val(); // capturar el valor del input
            $.ajax({
                url: 'buscar.php', // enlace
                type: 'POST', // tipo de petición
                data: {inputSearch},
                success: function (result) { // exito
                    let usuarios = JSON.parse(result);
                    let lista = '';
                    usuarios.forEach(usuario => {
                        lista += `<tr>
                            <td>${usuario.NOMBRE}</td>
                            <td>${usuario.NOMBRE}</td>
                            <td>${usuario.APELLIDO}</td>
                            <td>${usuario.CORREO}</td>
                            <td>${usuario.USUARIO}</td>
                         </tr>`
                    });
                    $('#lista-usuarios').html(lista);
                    $('#lista').show();
                    $('#buscar').click(function () {
                        $('#form-buscar').trigger('reset');
                        $('#inputSearch').focus();
                    })
                }
            })
        }else{
            $('#lista').hide();
        }
    })

    // AGREGAR
    $('#form-registro').submit(function (e) {
        e.preventDefault();
        const datosRegistro = {
            inputName: $('#inputName').val(),
            inputLastName: $('#inputLastName').val(),
            inputCorreo: $('#inputEmail').val(),
            inputUsuario: $('#inputUsuario').val(),
            inputClave: $('#inputPassword').val(),
            inputConfirmar: $('#inputConfirmar').val()
        };

        console.log(datosRegistro);
        $.post('agregar.php', datosRegistro, function (result) {
            console.log(result);
            $('#form-registro').trigger('reset');
            alert(result);
            listarUsuarios();
        })
    })

    //ELIMINAR
    $('#form-eliminar').submit(function (e) {
        e.preventDefault();
    })

    $('#inputDelete').keyup(function () { // escuchar evento sobre el input
        if ($('#inputDelete').val())
        {
            let inputDelete = $('#inputDelete').val(); // capturar el valor del input
            let usuarioEliminar;
            $.ajax({
                url: 'eliminar.php', // enlace
                type: 'POST', // tipo de petición
                data: {inputDelete},
                success: function (result) { // exito
                    let usuarios = JSON.parse(result);
                    let lista = '';
                    usuarios.forEach(usuario => {
                        lista += `
                        <tr id-eliminar="${usuario.ID_USUARIO}">
                            <td class="hidden">${usuario.ID_USUARIO}</td>
                            <td>${usuario.NOMBRE}</td>
                            <td>${usuario.APELLIDO}</td>
                            <td>${usuario.CORREO}</td>
                            <td>${usuario.USUARIO}</td>
                            <td><button class="user-deleted btn"><i class="fas fa-user-minus"></i></button></td>
                        </tr>`
                    });
                    $('#lista-usuarios').html(lista);
                    $('#lista').show();
                    $('#eliminar').click(function () {
                        $('#form-eliminar').trigger('reset');
                    })
                }
            })
        }else{
            $('#lista').hide();
        }
    })

    $(document).on('click', '.user-deleted', function (){
        if (confirm('¿Está seguro que quiere eliminar el registro?')) {
            let usuario = $(this)[0].parentElement.parentElement;
            let id = $(usuario).attr('id-eliminar');
            $.post('eliminar.php', {id}, function (result) {
                listarUsuarios();
                $('#form-eliminar').trigger('reset');
            })
        }
    })

    function listarUsuarios() {
        $.ajax({
            url: 'listarUsuarios.php',
            type: 'GET',
            success: function (result) {
                let usuarios = JSON.parse(result);
                let lista = '';
                usuarios.forEach(usuario => {
                    lista += `
                            <tr id-eliminar="${usuario.ID_USUARIO}">
                                <td class="hidden">${usuario.ID_USUARIO}</td>
                                <td>${usuario.NOMBRE}</td>
                                <td>${usuario.APELLIDO}</td>
                                <td>${usuario.CORREO}</td>
                                <td>${usuario.USUARIO}</td>
                                <!--<td><button class="user-deleted btn"><i class="fas fa-user-minus"></i></button></td>-->
                            </tr>`
                });
                $('#lista-usuarios').html(lista);
                $('#lista').show();
            }
        })
    }
});
