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
        success: function(resultado){
            console.log('deu certo');
            console.log(resultado);
        },
        error: function () {
            console.log('deu erro');
        }

    });
});
/*
$("#salvar").click(function (){
    $("#load").load("create-edit.blade.php");
});*/
