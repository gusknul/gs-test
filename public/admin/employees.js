$(document).ready(function () {
    $('#btn-new').click(function (e) {
        $('#new_employee').modal();
    });
});

function saveEmployee() {
    var employee_form = $('#form-employee')[0];
    var form_data = new FormData(employee_form);
    form_data.append('_token', window.Laravel.csrfToken);
    $('#list-errors').children().remove();
    $('#container-errors').hide();
    $.ajax({
        url: '/admin/employees',
        type: 'post',
        data: form_data,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                swal({
                    title: 'Exito!',
                    text: response.message,
                    type: 'success',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then(function () {
                    location.reload();
                }, function (dismmiss) {
                })
            } else {
                $.each(response.errors, function (index, value) {
                    $('#list-errors').append("<li>" + value + "</li>");
                });
                $('#container-errors').fadeIn();
            }

        },
        error: function (error) {
            console.log(error);
        }
    });
}

function deleteEmployee(employee_id) {
    swal({
        title: "Eliminar empleado",
        text: "¿Esta seguro que desea eliminar el empleado?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: '/admin/employees/' + employee_id,
                    type: 'DELETE',
                    data: {
                        _token: window.Laravel.csrfToken
                    },
                    success: function (response) {
                        if (response.status) {
                            resolve('Se elimino el empleado');
                        } else {
                            reject("Ocurrio un error en el servidor");
                        }
                    },
                    error: function (error) {
                        reject("Ocurrio un error en el servidor");
                    }
                });
            })
        }
    }).then(function (confirm) {
        swal({
            title: 'Exito!',
            text: confirm,
            type: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(function () {
            location.reload();
        }, function (dismmiss) {

        })
    }, function (dismiss) {
    });
}

function show(employee_id) {
    $.ajax({
        url: '/admin/employees/' + employee_id,
        type: 'GET',
        data: {
            _token: window.Laravel.csrfToken
        },
        success: function (response) {
            $('#body-show').children().remove();
            $('#body-show').append(response);
            $('#show_employee').modal();
        },
        error: function (error) {
            reject("Ocurrio un error en el servidor");
        }
    });
}

function edit(employee_id) {
    $.ajax({
        url: '/admin/employees/' + employee_id + '/edit',
        type: 'GET',
        data: {
            _token: window.Laravel.csrfToken
        },
        success: function (response) {
            $('#body-edit').children().remove();
            $('#body-edit').append(response);

            $('#change-password').click(function (e) {
                $('#password_update').val('').val('')
                $('#password_confirmation_update').val('');
                if ($(this).is(':checked')) {
                    $('.change_password').fadeIn();
                } else {
                    $('.change_password').hide();
                }
            });
            $('#edit_employee').modal();
        },
        error: function (error) {
            reject("Ocurrio un error en el servidor");
        }
    });
}

function updateEmployee() {
    var employee_id = $('#employee-id').val();
    var employee_form = $('#form-edit-employee')[0];
    var form_data = new FormData(employee_form);
    form_data.append('_token', window.Laravel.csrfToken);
    form_data.append('_method', 'patch');
    $('#list-edit-errors').children().remove();
    $('#container-edit-errors').hide();
    $.ajax({
        url: '/admin/employees/' + employee_id,
        type: 'post',
        data: form_data,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        success: function (response) {
            if (response.status) {
                swal({
                    title: 'Exito!',
                    text: response.message,
                    type: 'success',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then(function () {
                    location.reload();
                }, function (dismmiss) {
                })
            } else {
                $.each(response.errors, function (index, value) {
                    $('#list-edit-errors').append("<li>" + value + "</li>");
                });
                $('#container-edit-errors').fadeIn();
            }

        },
        error: function (error) {
            console.log(error);
        }
    });
}