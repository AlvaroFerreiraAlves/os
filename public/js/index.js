
    $("#salvar").click(function (){
        var form = new FormData($("#formulario")[0]);
        $.ajax({
            url: 'addservice',
            type: 'post',
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            data: form

        });
    });

    $("#salvar").click(function (){
       $("#load").load(" #load");
    });


