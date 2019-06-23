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
            setTimeout('saludo()', 100);
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
                location.reload();
            }
        },
        error: function (respuesta) {
            console.table(respuesta);
            alert("ERROR: " + respuesta["statusText"] + "\nCODIGO: " + respuesta["status"] + "\n\n" + respuesta["responseText"]);
        }
    });
});

