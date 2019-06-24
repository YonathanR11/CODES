var editor;
$(document).on("click", ".EditarCode", function () {
    var idcodeEdit = $(this).attr("idCode");
    var datos = new FormData();
    datos.append("idcodeEdit", idcodeEdit);
    $.ajax({
        url: "ajax/code.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idCodeEditOK").val(respuesta["id"]);
            $("#GIdCode").val(respuesta["id"]);
            $("#tituloEdit").val(respuesta["titulo"]);
            $("#descripcionEdit").val(respuesta["descripcion"]);
            $("#lenguajeEdit").val(respuesta["lenguaje"]);
            document.querySelector("#code").value = respuesta["codigo"];
            editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                lineNumbers: true,
                autoCloseBrackets: true,
                matchBrackets: true,
                theme: "darcula"
            });
            editor.refresh();
            setTimeout('saludo()', 200);
        },
        error: function (respuesta) {
            console.table(respuesta);
            alert("ERROR: " + respuesta["statusText"] + "\nCODIGO: " + respuesta["status"] + "\n\n" + respuesta["responseText"]);
        }
    });
});

function saludo() {
    editor.refresh();
}


$(document).on("click", ".SaveEditCode", function () {
    var idcodeEdit = $(this).attr("value");
    var datos = new FormData();
    datos.append("idcodeEditSave", idcodeEdit);
    datos.append("tituloEditOK", $('#tituloEdit').val());
    datos.append("descripEditOK", $('#descripcionEdit').val());
    datos.append("codigoEditOK", editor.getValue());
    datos.append("lenguEditOK", $('#lenguajeEdit').val());
    $.ajax({
        url: "ajax/code.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                Swal.fire({
                    position: 'top',
                    type: 'success',
                    title: 'Editado Correctamente!',
                    showConfirmButton: false,
                    timer: 1800
                }).then((result) => {
                    location.reload();
                });
            }
        },
        error: function (respuesta) {
            console.table(respuesta);
            alert("ERROR: " + respuesta["statusText"] + "\nCODIGO: " + respuesta["status"] + "\n\n" + respuesta["responseText"]);
        }
    });
});

$(document).on("click", ".DeleteCode", function () {
    var idcodeDelete = $(this).attr("idCode");
    var datos = new FormData();
    datos.append("idcodeDelete", idcodeDelete);
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
        title: '¿Eliminar?',
        text: "¡Esta accion no se puede revertir! ID: " + idcodeDelete,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "ajax/code.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    Swal.fire({
                        position: 'top',
                        type: 'success',
                        title: '¡Eliminado Correctamente!',
                        showConfirmButton: false,
                        timer: 1800
                    }).then((result) => {
                        location.reload();
                    });
                },
                error: function (respuesta) {
                    console.table(respuesta);
                    alert("ERROR: " + respuesta["statusText"] + "\nCODIGO: " + respuesta["status"] + "\n\n" + respuesta["responseText"]);
                    Swal.fire({
                        type: "error",
                        title: "¡Error!",
                        text: "¡No se pudo eliminar el codigo! Intenta de nuevo!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'El codigo no se elimino.',
                'error'
            )
        }
    })
});