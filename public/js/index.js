$("#salvar").click(function () {
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
            for (var key in data) {
                var i = key;
            }
            var x = i;
            product = '<tr id="product' + data[x].id + '"><td>' + data[x].id + '</td><td>' + data[x].nome + '</td><td>' + data[x].valor + '</td>';
            product += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data[x].id + '">Edit</button>';
            product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data[x].id + '">Delete</button></td></tr>';
            $('#products-list').append(product);

        }
    });

});

$(document).on('click','.delete-product',function(){
    var product_id = $(this).val();
    console.log(product_id);

   /* $.ajax({
        type: "DELETE",
        url: url + '/' + product_id,
        success: function (data) {
            console.log(data);
            $("#product" + product_id).remove();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });*/
});
