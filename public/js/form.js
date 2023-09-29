$(document).ready(function() {
    $('#telefone').mask('(00) 00000-0000');
});

function editar() {
    const id = $('#id').val();

    $.ajax({
        url: '/usuarios/editar/' + id,
        type: 'POST',
        data: new FormData($('#formEdit')[0]),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            if (response['error']) {
                alert(response['response']);
                return false;
            }

            window.location.href = '/usuarios';
        }
    });
}

function salvar() {
    $.ajax({
        url: '/usuarios/salvar',
        type: 'POST',
        data: new FormData($('#formSave')[0]),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            if (response['error']) {
                alert(response['response']);
                return false;
            }

            window.location.href = '/usuarios';
        }
    });
}
