$(".fecha").datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    language: "es",
    startDate: '+0d'
});
$("#fecha_nacimiento").datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    language: "es"
});

$(function(){
    $("#ida").click(function(){
        var field = document.getElementById("fieldset"); 
        var fechar= document.getElementById("fecharegreso");
        field.removeAttribute("disabled");
        fechar.setAttribute("disabled","");
    });
    $("#regreso").click(function(){
        var fechar= document.getElementById("fecharegreso"); 
        fechar.removeAttribute("disabled");
    });
});


