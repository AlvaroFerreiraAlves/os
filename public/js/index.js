$(document).ready(function (){
    $("#salvar").click(function (){
        var form = new FormData($("#formulario")[0]);
        $.ajax({
            url: 'addservice',
            type: 'post',
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            data: form,
            timeout: 8000,
            success: function () {
                $("#load").load(location.href+" #load>*","",function() {
                    alert( "Servico cadastrado com sucesso." )});
                $('#formulario')[0].reset();

            }

        });
    });


});
