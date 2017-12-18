
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
            success: function (data) {
                console.log(data);
                product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.nome + '</td><td>' + data.valor + '</td>';
                $('#products-list').append(product);
            }
        });

    });



    function loadTable() {
        $("#load").load(" #load");
    }

