$(document).ready(function (){
    $("#addservico").click(function (){
        var form = new FormData($("#formservico")[0]);
        $.ajax({
            url: 'add-service',
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
            }

        });
    });


});
