$(document).ready(function () {
    listar_roles();
    $("#formulario").on("submit", function (e) {
        e.preventDefault();
        if (validar()) {
            $.ajax({
                type: "POST",
                url: "../rol_create",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        $("#ModalRol").modal("hide");
                        $("#alert").html(
                            '<div class="alert alert-success" role="alert">Rol Agregado Correctamente' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                "</button>" +
                                "</div>"
                        );
                        listar_roles();
                    } else if (response == 0) {
                        $("#ModalRol").modal("hide");
                        $("#alert").html(
                            '<div class="alert alert-primary" role="alert">Este Rol esta en existencia' +
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
                        alert("Error de Operación");
                    }
                },
            });
        }
    });

    $("#formulario").on("submit", function (e) {
        e.preventDefault();
        if (validar()) {
            $.ajax({
                type: "POST",
                url: "../rol_create",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        $("#ModalRol").modal("hide");
                        $("#alert").html(
                            '<div class="alert alert-success" role="alert">Rol Agregado Correctamente' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                "</button>" +
                                "</div>"
                        );
                        listar_roles();
                    } else if (response == 0) {
                        $("#ModalRol").modal("hide");
                        $("#alert").html(
                            '<div class="alert alert-primary" role="alert">Este Rol esta en existencia' +
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
                        alert("Error de Operación");
                    }
                },
            });
        }
    });
});

function listar_roles() {
    var cont = 1;
    $("#tablaroles").DataTable({
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
        ajax: "../rol_show",
        method: "POST",
        columns: [
            {
                data: "id",
                render: function (data) {
                    return cont++;
                },
            },

            { data: "rol" },

            {
                data: "estado_rol",
                render: function (data) {
                    estado = data;
                    if (data == 1) {
                        return "<span class='badge badge-success'>Activo</span>";
                    } else {
                        return "<span class='badge badge-danger'>Inactivo</span>";
                    }
                },
            },

            /* {
                data: "id",
                render: function (data) {
                    if (estado == 1) {
                        return (
                            "<div class='btn-group' role='group'><button type='button' class='btn text-warning btn-sm' style='outline: none;box-shadow: none' value=" +
                            data +
                            " onclick='preparar(" +
                            data +
                            ")'data-toggle='modal' data-target='#ModalRolUpdate'>Editar</button>" +
                            "<button type='button' class='btn text-dark  btn-sm' style='outline: none;box-shadow: none' value=" +
                            data +
                            " onclick='bloquear(" +
                            data +
                            ")'>Bloquear</button>" +
                            "<button type='button'value=" +
                            data +
                            " onclick='eliminar(" +
                            data +
                            ")' class='btn text-danger btn-sm' style='outline: none;box-shadow: none'>Eliminar</button></div>"
                        );
                    } else {
                        return (
                            "<button type='button' value=" +
                            data +
                            " onclick='renovar(" +
                            data +
                            ")' class='btn text-success btn-sm' style='outline: none;box-shadow: none'><i class='fas fa-undo'></i></button></div>"
                        );
                    }
                },
            }, */
        ],
    });
}

function preparar(id) {
    $.get("../rol_edit/" + id, function (rol) {
        $("#id").val(rol[0].id);
        $("#rol_update").val(rol[0].rol);
    });
}

function validar() {
    var cont = 0;

    var rol = $("#rol").val();
    if (rol != "") {
        $("#rol").removeClass("is-invalid");
        $("#rol").addClass("is-valid");
        cont++;
    } else {
        $("#rol").addClass("is-invalid");
    }

    if (cont == 1) {
        return true;
    } else {
        return false;
    }
}
