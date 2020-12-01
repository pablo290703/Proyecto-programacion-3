//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatePersona();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormPersona();
        $("#typeAction").val("add_persona");
        $("#myModalFormulario").modal();
    });
    
    
    
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    cargarTablas();
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersona() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/personaController.php',
            data: {
                action:         $("#typeAction").val(),
                idPersona:      $("#txtidPersona").val(),
                Nombre:         $("#txtNombre").val(),
                Apellido1:      $("#txtApellido1").val(),
                Apellido2:      $("#txtApellido2").val(),
                Eecha_Nacimiento:  $("#txtFecha_Nacimiento").val(),
                Correo_Electronico:           $("#txtCorreo_Electronico").val(),
                Direccion:  $("#txtDireccion").val(),
                Telefono:  $("#txtTelefono").val()
              
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    swal("Confirmacion", responseText, "success");
                    clearFormPersona();
                    $("#dt_persona").DataTable().ajax.reload();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}

//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;

    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtidPersona").val() === "") {
        validacion = false;
    }

    if ($("#txtNombre").val() === "") {
        validacion = false;
    }

    if ($("#txtApellido1").val() === "") {
        validacion = false;
    }

    if ($("#txtApellido2").val() === "") {
        validacion = false;
    }

    if ($("#txtFecha_Nacimiento").val() === "") {
        validacion = false;
    }

    if ($("#txtCorreo_Electronico").val() === "") {
        validacion = false;
    }

    if ($("#txtDirrecion").val() === "") {
        validacion = false;
    }
    
     if ($("#txtTelefono").val() === "") {
        validacion = false;
    }

    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormPersona() {
    $('#formPersona').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormPersona();
    $("#typeAction").val("add_persona");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showPersonaByID(idPersona) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/personaController.php',
        data: {
            action: "show_persona",
            idPersona: idPersona
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonaJSon = JSON.parse(data);
            $("#txtidPersona").val(objPersonaJSon.idPersona);
            $("#txtNombre").val(objPersonaJSon.Nombre);
            $("#txtApellido1").val(objPersonaJSon.Apellido1);
            $("#txtApellido2").val(objPersonaJSon.Apellido2);
            $("#txtFecha_Nacimiento").val(objPersonaJSon.Fecha_Nacimiento);
            $("#txtsexo").val(objPersonaJSon.sexo);
            $("#txtobservaciones").val(objPersonaJSon.observaciones);
            $("#typeAction").val("update_persona");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonaByID(idPersona) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/personaController.php',
        data: {
            action: "delete_persona",
            idPersona: idPersona
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormPersona();
                $("#dt_persona").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}




//*******************************************************************************
//Metodo para cargar las tablas
//*******************************************************************************


function cargarTablas() {



    var dataTablePersona_const = function () {
        if ($("#dt_persona").length) {
            $("#dt_persona").DataTable({
                dom: "Bfrtip",
                bFilter: false,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        text: "Imprimir"
                    }

                ],
                "columnDefs": [
                    {
                        targets: 6,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showPersonasByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletePersonasByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/controller/personaController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_persona"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_persona').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTablePersona_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();
}

//*******************************************************************************
//evento que reajusta la tabla en el tamaño de la pantall
//*******************************************************************************

window.onresize = function () {
    $('#dt_persona').DataTable().columns.adjust().responsive.recalc();
};



