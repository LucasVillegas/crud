$(document).ready(function () {
    listar_usuarios();
    listar_Rol();

    $("#formulario").on("submit", function (e) {
        e.preventDefault();
        if (validar()) {
            $.ajax({
                type: "POST",
                url: "../user_create",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        $("#exampleModal").modal("hide");
                        $("#alert").html(
                            '<div class="alert alert-success" role="alert">Usuario Agregado Correctamente' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                "</button>" +
                                "</div>"
                        );
                        listar_usuarios();
                    } else if (response == 0) {
                        $("#exampleModal").modal("hide");
                        $("#alert").html(
                            '<div class="alert alert-primary" role="alert">Usuario esta en existencia' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                "</button>" +
                                "</div>"
                        );
                    } else {
                        $("#alert").html(
                            '<div class="alert alert-danger" role="alert">Error de Operación' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                "</button>" +
                                "</div>"
                        );
                    }
                },
            });
        }
     });

    $("#formularios").on("submit", function (e) {
        e.preventDefault();
        //if (validar()) {}
        $.ajax({
            type: "POST",
            url: "../user_update",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response == 1) {
                    $("#exampleModalupdate").modal("hide");
                    $("#alert").html(
                        '<div class="alert alert-success" role="alert">Usuario Actualizado Correctamente' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            "</button>" +
                            "</div>"
                    );
                    listar_usuarios();
                } else if (response == 0) {
                    $("#exampleModalupdate").modal("hide");
                    $("#alert").html(
                        '<div class="alert alert-primary" role="alert">Este Rol esta en existencia' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            "</button>" +
                            "</div>"
                    );
                } else {
                    $("#exampleModalupdate").modal("hide");
                    $("#alert").html(
                        '<div class="alert alert-danger" role="alert">Error de Operación' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            "</button>" +
                            "</div>"
                    );
                }
            },
        });
    });

    $("#formularioss").on("submit", function (e) {
        e.preventDefault();
        //if (validar()) {}
        $.ajax({
            type: "POST",
            url: "../user_update_cuenta",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response == 1) {
                    $("#exampleModalupdates").modal("hide");
                    $("#alert").html(
                        '<div class="alert alert-success" role="alert">Usuario Actualizado Correctamente' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            "</button>" +
                            "</div>"
                    );
                    listar_usuarios();
                } else if (response == 0) {
                    $("#exampleModalupdates").modal("hide");
                    $("#alert").html(
                        '<div class="alert alert-primary" role="alert">Este Usuario esta en existencia' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            "</button>" +
                            "</div>"
                    );
                } else {
                    $("#exampleModalupdates").modal("hide");
                    $("#alert").html(
                        '<div class="alert alert-danger" role="alert">Error de Operación' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            "</button>" +
                            "</div>"
                    );
                }
            },
        });
    });
});

function listar_usuarios() {
    var cont = 1;
    $("#tablausuario").DataTable({
        responsive: true,
        autoWidth: false,
        destroy: true,
        searching: true,
        language: {
            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
            infoFiltered: "(Filtrado de _MAX_ total entradas)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Ultimo",
                next: "Siguiente",
                previous: "Anterior",
            },
        },
        ajax: "../user_show",
        method: "POST",
        columns: [
            {
                data: "persona_id",
                render: function (data) {
                    return cont++;
                },
            },

            { data: "identificacion" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "usuario" },
            { data: "rol" },
            {
                data: "estado",
                render: function (data) {
                    estado = data;
                    if (data == 1) {
                        return "<span class='badge badge-success'>Activo</span>";
                    } else {
                        return "<span class='badge badge-danger'>Inactivo</span>";
                    }
                },
            },

            {
                data: "persona_id",
                render: function (data) {
                    if (estado == 1) {
                        return (
                            "<div class='btn-group' role='group'><button type='button' class='btn text-warning btn-sm' style='outline: none;box-shadow: none' value=" +
                            data +
                            " onclick='preparar(" +
                            data +
                            ")'data-toggle='modal' data-target='#exampleModalupdate'>Editar Datos</button>" +
                            "<button type='button' class='btn text-info btn-sm' style='outline: none;box-shadow: none' value=" +
                            data +
                            " onclick='prepararcuenta(" +
                            data +
                            ")'data-toggle='modal' data-target='#exampleModalupdates'>Editar Cuenta</button>" +
                            "<button type='button' class='btn text-danger btn-sm' style='outline: none;box-shadow: none' value=" +
                            data +
                            " onclick='eliminar(" +
                            data +
                            ")'>Eliminar Usuario</button>" +
                            "</div>"
                        );
                    }
                },
            },
        ],
    });
}

function eliminar(id) {
    $.get("../delete_user/" + id, function (respuesta) {
        if (respuesta == 1) {
            $("#alert").html(
                '<div class="alert alert-success" role="alert">Usuario Actualizado Correctamente' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    "</button>" +
                    "</div>"
            );
            listar_usuarios();
        } else {
            $("#alert").html(
                '<div class="alert alert-danger" role="alert">Error de Operacion' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    "</button>" +
                    "</div>"
            );
            listar_usuarios();
        }
    });
}

function prepararcuenta(id) {
    $.get("../user_edit_cuenta/" + id, function (user) {
        $("#ids").val(user[0].user_id);
        $("#rol_updates").val(user[0].rol_id);
        $("#clave_updates").val(user[0].password);
        $("#confirmar_clave_updates").val(user[0].password);
        $("#usuario_updates").val(user[0].username);
    });
    ///* Para Ocultar los datos Personales para editar datos de cuenta */
    $("#personales").hide();
}

function preparar(id) {
    $.get("../user_edit/" + id, function (user) {
        $("#id").val(user[0].persona_id);
        $("#identificacion_update").val(user[0].identificacion);
        $("#nombres_update").val(user[0].nombre);
        $("#apellidos_update").val(user[0].apellido);
        $("#rol_update").val(user[0].rol_id);
        $("#clave_update").val(user[0].password);
        $("#confirmar_clave_update").val(user[0].password);
        $("#usuario_update").val(user[0].username);
    });
    ///* Para Ocultar los datos de la cuenta para editar datos personales */
    $("#cuenta").hide();
}

function listar_Rol() {
    $.get("../usuario_listar_rol", function (respuesta) {
        let vendedor = JSON.parse(JSON.stringify(respuesta));
        let template =
            '<option value="#" id="opcion">Selecciona un Rol</option>';
        vendedor.forEach((ven) => {
            template += `<option value="${ven.id}"><b>${ven.rol}</option>`;
        });
        $("#rol").html(template);
        //$("#rol_updates").html(template);
    });
}

function validar() {
    var cont = 0;

    var identificacion = $("#identificacion").val();
    if (identificacion != "" && identificacion.length > 4) {
        $("#identificacion").removeClass("is-invalid");
        $("#identificacion").addClass("is-valid");
        cont++;
    } else {
        $("#identificacion").addClass("is-invalid");
    }

    var nombres = $("#nombres").val();
    if (nombres != "") {
        $("#nombres").removeClass("is-invalid");
        $("#nombres").addClass("is-valid");
        cont++;
    } else {
        $("#nombres").addClass("is-invalid");
    }

    var apellidos = $("#apellidos").val();
    if (apellidos != "") {
        $("#apellidos").removeClass("is-invalid");
        $("#apellidos").addClass("is-valid");
        cont++;
    } else {
        $("#apellidos").addClass("is-invalid");
    }

    var usuario = $("#usuario").val();
    if (usuario != "") {
        $("#usuario").removeClass("is-invalid");
        $("#usuario").addClass("is-valid");
        cont++;
    } else {
        $("#usuario").addClass("is-invalid");
    }

    var clave = $("#clave").val();
    var confirmar_clave = $("#confirmar_clave").val();
    if (
        clave != "" &&
        clave.length >= 8 &&
        confirmar_clave != "" &&
        confirmar_clave.length >= 8
    ) {
        if (clave == confirmar_clave) {
            $("#clave").addClass("is-valid");
            $("#confirmar_clave").addClass("is-valid");
            $("#clave").removeClass("is-invalid");
            $("#confirmar_clave").removeClass("is-invalid");
            cont++;
        }
    } else {
        $("#alert").html(
            '<div class="alert alert-danger" role="alert">La Clave no son iguales o No superan los 8 catacteres' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                "</button>" +
                "</div>"
        );
        $("#clave").addClass("is-invalid");
        $("#confirmar_clave").addClass("is-invalid");
    }

    if (cont == 5) {
        return true;
    } else {
        return false;
    }
}

function limpiarModal() {
    $("#id").val("");
}
