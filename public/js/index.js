function saveCustomer() {
    var data = $('#form-customer-modal').serialize();

    $.ajax({
        url: "../customer/store",
        method: "POST",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error)) {
            printSuccessMsg(data);
            $("#form-customer-modal").trigger('reset');
            $(".customer").load(location.href + " .customer>*", "");
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error);
            $('.print-success-msg').hide();

        }
    })
}


function updateCustomer(id) {
    var data = $('#form-customer').serialize();

    $.ajax({
        url: "../customer/update/" + id,
        method: "PUT",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error)) {
            printSuccessMsg(data);
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error);
            $('.print-success-msg').hide();

        }
    })
}


function saveItem() {
    var data = $('#form-item-modal').serialize();

    $.ajax({
        url: "../items/store",
        method: "POST",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error_description)) {
            printSuccessMsg(data);
            $("#form-item-modal").trigger('reset');
            $(".item").load(location.href + " .item>*", "");
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error_description);
            $('.print-success-msg').hide();

        }

        console.log(data.error_description);
    })
}

function updateItem(id) {
    var data = $('#form-item-modal').serialize();

    $.ajax({
        url: "../items/update/" + id,
        method: "PUT",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error_description)) {
            printSuccessMsg(data);
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error_description);
            $('.print-success-msg').hide();

        }

        console.log(data.error_description);
    })
}

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}

function printSuccessMsg(msg) {
    $(".print-success-msg").find("ul").html('');
    $(".print-success-msg").css('display', 'block');
    $(".print-success-msg").find("ul").append('<li>' + msg + '</li>');

}

function hideMessage() {
    $('.print-error-msg').hide();
    $('.print-success-msg').hide();
}

function addItem() {
    var data = $('#form-add-item').serialize();

    $.ajax({
        url: "../order/addservice",
        method: "POST",
        data: data
    }).done(function (data) {

        desconto;

        if(data.item.desconto){

            desconto = data.item.desconto;
        }else{

            desconto = '-';
        }
        product = '<tr id="product' + data.item.id + '"><td>' + data.item.id + '</td><td>' + data.item.nome + '</td><td>' + data.item.valor + '</td><td>' + data.qtd + '</td><td id="descproduct'+ data.item.id +'">'+desconto+'</td><td>' + data.item.valor * data.qtd + '</td>';
        product += '<td><button type="button" id="delete' + data.item.id + '"class="btn btn-danger btn-delete delete-item" value="' + data.item.id + '">X</button></td></tr>';

        if (!$("#product" + data.item.id).length) {
            $('#products-list').append(product);
            total();
        }
        else if ($("#product" + data.item.id).length) {

            $("#product" + data.item.id).replaceWith(product);
            total();
        }


    })
}



$(document).on('click', '.delete-item', function () {
    var id = event.target.id;
    var parametro = $("#" + id).val();

    $.ajax({
        url: "../order/removeservice/" + parametro,
        method: "POST",
    }).done(function () {

        var tr = $("#" + id).closest('tr');
        tr.remove();
        total();

    })
});

function total() {

    $.ajax({
        url: "order/total/" + 0,
        method: "POST",
        data: ""
    }).done(function (data) {
        $("#total").text("Total: R$ " + data);
    });
}



function descontoTotal() {
    var data = $('#form-desconto-total').serialize();

    $.ajax({
        url: "../desconto-total",
        method: "POST",
        data: data,
    }).done(function (data) {

        for (var d in data) {
            console.log(data[d].item.id);
            product = '<td id="descproduct'+ data[d].item.id +'">'+ data[d].item.desconto+'</td>';

            if ($("#descproduct" + data[d].item.id).length) {

                $("#descproduct" + data[d].item.id).replaceWith(product);
                total();
            }
            total();

        }

    });
}
